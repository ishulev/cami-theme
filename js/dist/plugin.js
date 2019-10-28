"use strict";

(function (wp) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;
  var Text = wp.components.TextControl;
  var FormFileUpload = wp.components.FormFileUpload;
  var withSelect = wp.data.withSelect;
  var withDispatch = wp.data.withDispatch;

  var MyFormFileUpload = function MyFormFileUpload() {
    return React.createElement(FormFileUpload, {
      accept: "image/*",
      onChange: function onChange() {
        return console.log('new image');
      }
    }, "Upload");
  };

  var mapSelectToProps = function mapSelectToProps(select) {
    return {
      metaFieldValue: select('core/editor').getEditedPostAttribute('meta')['sidebar_plugin_meta_block_field']
    };
  };

  var mapDispatchToProps = function mapDispatchToProps(dispatch) {
    return {
      setMetaFieldValue: function setMetaFieldValue(value) {
        dispatch('core/editor').editPost({
          meta: {
            sidebar_plugin_meta_block_field: value
          }
        });
      }
    };
  };

  var MetaBlockField = function MetaBlockField(props) {
    return el(FormFileUpload, {
      label: 'Meta Block Field',
      value: props.metaFieldValue,
      accept: 'image/*',
      multiple: true,
      onChange: function onChange(content) {
        console.log('New image => ', content); // props.setMetaFieldValue(content);
      }
    });
  };

  var MetaBlockFieldWithData = withSelect(mapSelectToProps)(MetaBlockField);
  var MetaBlockFieldWithDataAndActions = withDispatch(mapDispatchToProps)(MetaBlockFieldWithData);
  registerPlugin('my-plugin-sidebar', {
    render: function render() {
      return el(PluginSidebar, {
        name: 'my-plugin-sidebar',
        icon: 'admin-post',
        title: 'My plugin sidebar'
      }, el('div', {
        className: 'plugin-sidebar-content'
      }, el(MetaBlockFieldWithDataAndActions)));
    }
  });
})(window.wp);