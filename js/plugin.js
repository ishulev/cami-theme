import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { FormFileUpload } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const MyDocumentSettingTest = () => (
  <PluginDocumentSettingPanel className="my-document-setting-plugin" title="Добави медец">
    <FormFileUpload
      accept="image/*"
      multiple
      onChange={ev => console.log('new image => ', ev.target.files)}
    >
      Upload
    </FormFileUpload>
  </PluginDocumentSettingPanel>
);

registerPlugin('cami-sidebar', {
  icon: 'buddicons-topics',
  render: MyDocumentSettingTest
});