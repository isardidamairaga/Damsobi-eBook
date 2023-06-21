const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-togler");

menuBtn.addEventListener('click',()=>{
    sideMenu.style.display ='block';
})

closeBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'none';
})


themeToggler.addEventListener('click',()=>{
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

document.querySelectorAll("#image").forEach(inputElement =>{
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click",e =>{
        inputElement.click();
    });

    inputElement.addEventListener("change",e =>{

        if(inputElement.files.length){
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover",e=>{
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over")
    });
    ["dragleave","dragend"].forEach(type =>{
        dropZoneElement.addEventListener(type,e=>{
            dropZoneElement.classList.remove("drop-zone--over");

        });
    });

    dropZoneElement.addEventListener("drop",e=>{
        e.preventDefault();  
        const files = e.dataTransfer.files;

    if (files.length) {
        inputElement.file = files[0];
        updateThumbnail(dropZoneElement, files[0]);
    }

        dropZoneElement.classList.remove("drop-zone--over")
    });
});
/** 
@param {HTMLElement} dropZoneElement
@param {file} file
*/

function updateThumbnail(dropZoneElement,file){
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    if(dropZoneElement.querySelector(".drop-zone__prompt")){
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    if(!thumbnailElement){
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    if(file.type.startsWith("image/")){
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () =>{
            thumbnailElement.style.backgroundImage = `url('${ reader.result}')`;
        };
    }

}