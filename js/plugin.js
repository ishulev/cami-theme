const { registerPlugin } = wp.plugins;
const { PluginSidebar } = wp.editPost;
const { __ } = wp.i18n;
var el = wp.element.createElement;
var Text = wp.components.TextControl;
var FormFileUpload = wp.components.FormFileUpload;
var withSelect = wp.data.withSelect;
var withDispatch = wp.data.withDispatch;

const MyFormFileUpload = () => (
  <FormFileUpload
    accept="image/*"
    onChange={() => console.log('new image')}
  >
    Upload
    </FormFileUpload>
);

var mapSelectToProps = function (select) {
  return {
    metaFieldValue: select('core/editor')
      .getEditedPostAttribute('meta')
    ['sidebar_plugin_meta_block_field'],
  }
}

var mapDispatchToProps = function (dispatch) {
  return {
    setMetaFieldValue: function (value) {
      dispatch('core/editor').editPost(
        { meta: { sidebar_plugin_meta_block_field: value } }
      );
    }
  }
}

var MetaBlockField = function (props) {
  return el(FormFileUpload, {
    label: 'Meta Block Field',
    value: props.metaFieldValue,
    accept: 'image/*',
    multiple: true,
    onChange: function (content) {
      console.log('New image => ', content)
      // props.setMetaFieldValue(content);
    },
  });
}

var MetaBlockFieldWithData = withSelect(mapSelectToProps)(MetaBlockField);
var MetaBlockFieldWithDataAndActions = withDispatch(mapDispatchToProps)(MetaBlockFieldWithData);

registerPlugin('my-plugin-sidebar', {
  render: function () {
    return el(PluginSidebar,
      {
        name: 'my-plugin-sidebar',
        icon: 'admin-post',
        title: 'My plugin sidebar',
      },
      el('div',
        { className: 'plugin-sidebar-content' },
        el(MetaBlockFieldWithDataAndActions)
      )
    );
  }
});