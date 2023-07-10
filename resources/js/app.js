import './bootstrap';

import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
 // Import the plugin code
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

FilePond.registerPlugin(FilePondPluginFileValidateSize);
FilePond.registerPlugin(FilePondPluginFileValidateType);
 
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const inputPDF = document.querySelector('input[type="file"].filepond');
FilePond.create(inputPDF).setOptions({
      // set allowed file types with mime types
    maxFileSize: '40MB',
    acceptedFileTypes: ["application/pdf"],
    server: {
        process: '/uploads/process',
        revert: "/uploads/revert",
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    }
});