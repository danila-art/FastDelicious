const buttonRegRest = document.getElementById('buttonRegRest');
const buttonInRest = document.getElementById('buttonInRest');
const blockAddRestorant = document.getElementById('blockAddRestorant');
const blockInnerProfile = document.getElementById('blockInnerProfile');
buttonRegRest.addEventListener('click', () => {
    if (getComputedStyle(blockInnerProfile).display == 'none') {
        blockInnerProfile.style.display = 'block';
        blockAddRestorant.style.display = 'none';
    }
});
buttonInRest.addEventListener('click', () => {
    if (getComputedStyle(blockAddRestorant).display == 'none') {
        blockAddRestorant.style.display = 'block';
        blockInnerProfile.style.display = 'none';
    }
});

// checked form add
const formAddRestourant = document.getElementById('form-add-restourant');
formAddRestourant.addEventListener('submit', (e) => {
    e.preventDefault();
    let arrErrorAdd = [];
    const fileImg = document.getElementById('file-img');
    const inputFormAdd = formAddRestourant.querySelectorAll('.input-box-add');
    inputFormAdd.forEach((elem) => {
        if (elem.value == '') {
            elem.nextElementSibling.innerHTML = 'Поле пусто';
            arrErrorAdd.push(false);
            elem.addEventListener('keydown', () => {
                elem.nextElementSibling.innerHTML = '';
            });
        }
    });
    if (fileImg.value == '') {
        fileImg.addEventListener('change', () => {
            fileImg.nextElementSibling.innerHTML = '';
        });
    }
    if (fileImg.files[0].type == 'image/jpeg' || fileImg.files[0].type == 'image/png' && fileImg.value != '') {
        console.log('Ок');
    } else {
        fileImg.nextElementSibling.innerHTML = 'Файл не является изображением';
        arrErrorAdd.push(false);
        console.log(fileImg.files[0].type)
        fileImg.addEventListener('change', () => {
            fileImg.nextElementSibling.innerHTML = '';
        });
    }
    if (inputFormAdd[5].value != inputFormAdd[6].value) {
        inputFormAdd[6].nextElementSibling.innerHTML = 'Пароли не совпадают';
        inputFormAdd[6].addEventListener('click', () => {
            arrErrorAdd.push(false);
            inputFormAdd[6].nextElementSibling.innerHTML = '';
        });
    }
    if (arrErrorAdd.length == 0) {
        formAddRestourant.submit();
    }
});

// checked form inner
const formInnerRestourant = document.getElementById('form-inner-restourant');
formInnerRestourant.addEventListener('submit', (e) => {
    e.preventDefault();
    let arrErrorInner = [];
    const inputFormInner = formInnerRestourant.querySelectorAll('.input-box-add');
    inputFormInner.forEach((elem) => {
        if (elem.value == '') {
            elem.nextElementSibling.innerHTML = 'Поле пусто';
            arrErrorInner.push(false);
            elem.addEventListener('keydown', () => {
                elem.nextElementSibling.innerHTML = '';
            });
        }
    });
    if (arrErrorInner.length == 0) {
        formInnerRestourant.submit();
    }
});
