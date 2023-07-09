import './bootstrap';

import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
 
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const inputPDF = document.querySelector('input[type="file"].filepond');
FilePond.create(inputPDF).setOptions({
    server: {
        process: '/uploads/process',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    }
});