import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { FormFileUpload } from '@wordpress/components';
import { uploadMedia } from '@wordpress/media-utils';
import { __ } from '@wordpress/i18n';

const handleFileChange = returnedFiles => console.log(returnedFiles);
const handleFileError = console.error;

const MyDocumentSettingTest = () => (
  <PluginDocumentSettingPanel className="my-document-setting-plugin" title="Добави медец">
    <FormFileUpload
      accept="image/*"
      multiple
      onChange={ev => uploadMedia({
        filesList: ev.target.files,
        onFileChange: handleFileChange,
        onError: handleFileError
      })}
    >
      Upload
    </FormFileUpload>
  </PluginDocumentSettingPanel>
);

registerPlugin('cami-sidebar', {
  icon: 'buddicons-topics',
  render: MyDocumentSettingTest
});