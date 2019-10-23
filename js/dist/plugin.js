/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { compose } from '@wordpress/compose';
import { withSelect, withDispatch } from '@wordpress/data';
import { PluginPostStatusInfo } from '@wordpress/editPost';
import { ToggleControl } from '@wordpress/components';

function HideTitleComponent({
  hideTitle,
  onUpdate
}) {
  return React.createElement(Fragment, null, React.createElement(PluginPostStatusInfo, {
    className: "edit-post-hidetitle"
  }, React.createElement(ToggleControl, {
    key: "togglecontrol",
    label: __('Hide title', 'wp-gutenberg-hidetitle'),
    checked: !!hideTitle,
    onChange: () => onUpdate(!hideTitle)
  }), !!hideTitle && React.createElement("p", null, React.createElement("em", null, React.createElement("small", null, __('Remember to add a H1 manually to rank well in search engines.', 'wp-gutenberg-hidetitle'))))));
}

export default compose([withSelect(select => {
  return {
    hideTitle: select('core/editor').getEditedPostAttribute('meta').hide_title
  };
}), withDispatch(dispatch => ({
  onUpdate(hideTitle) {
    dispatch('core/editor').editPost({
      meta: {
        hide_title: hideTitle
      }
    });
  }

}))])(HideTitleComponent);