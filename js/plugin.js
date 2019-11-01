import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import { registerPlugin } from '@wordpress/plugins';
import { uploadMedia } from '@wordpress/media-utils';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { FormFileUpload, SelectControl } from '@wordpress/components';
import { withSelect, withDispatch } from '@wordpress/data';

let mediaItems = [];

apiFetch({ path: '/wp/v2/media' }).then(media => {
  mediaItems = media.map(({ id, slug }) => ({ value: id, label: slug }));
});
// const handleFileChange = returnedFiles => console.log(returnedFiles);
// const handleFileError = console.error;
let MySelectControl = props => (
  <SelectControl
    multiple
    label={__('Избери картинки за поста:')}
    value={props.mediaObjects}
    onChange={(mediaObjects) => props.onMetaFieldChange(mediaObjects)}
    options={mediaItems}
  />
);

MySelectControl = withSelect(
  (select) => {
    return {
      mediaObjects: select('core/editor').getEditedPostAttribute('meta')['sidebar_plugin_meta_block_field']
    }
  }
)(MySelectControl);

MySelectControl = withDispatch(
  (dispatch) => {
    return {
      onMetaFieldChange: (value) => {
        dispatch('core/editor').editPost({ meta: { sidebar_plugin_meta_block_field: value } })
      }
    }
  }
)(MySelectControl);


const MyDocumentSettingTest = () => (
  <PluginDocumentSettingPanel className="my-document-setting-plugin" title="Добави медец">
    {/* <FormFileUpload
      accept="image/*"
      multiple
      onChange={ev => uploadMedia({
        filesList: ev.target.files,
        onFileChange: handleFileChange,
        onError: handleFileError
      })}
    >
      Upload
    </FormFileUpload> */}
    <MySelectControl />
  </PluginDocumentSettingPanel>
);

registerPlugin('cami-sidebar', {
  icon: 'buddicons-topics',
  render: MyDocumentSettingTest
});