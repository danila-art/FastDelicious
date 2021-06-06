// open module
const addGoodsModule = document.getElementById('addGoodsModule');
const buttonAddGoods = document.getElementById('buttonAddGoods');
const buttonCloseModule = document.getElementById('buttonCloseModule');
buttonAddGoods.addEventListener('click', () => {
    if (getComputedStyle(addGoodsModule).display == 'none') {
        addGoodsModule.style.display = 'block';
        buttonCloseModule.addEventListener('click', () => {
            addGoodsModule.style.display = 'none';
        });
    }
});
// checked form add goods
const formAddGoods = document.getElementById('formAddGoods');
formAddGoods.addEventListener('submit', (e) => {
    e.preventDefault();
    const fileGoodsImg = document.getElementById('fileGoodsImg');
    let errorAddGoods = [];
    const inputAddGoods = formAddGoods.querySelectorAll('.input-box-add');
    inputAddGoods.forEach((elem) => {
        if (elem.value == '') {
            errorAddGoods.push(false);
            elem.nextElementSibling.innerHTML = 'Поле пусто';
            elem.addEventListener('keydown', () => {
                elem.nextElementSibling.innerHTML = '';
            });
        }
    });
    if (fileGoodsImg.files[0].type == 'image/jpeg' || fileGoodsImg.files[0].type == 'image/png' && fileGoodsImg.value != '') {
        console.log('Ок');
    } else {
        fileGoodsImg.nextElementSibling.innerHTML = 'Файл не является изображением';
        errorAddGoods.push(false);
        console.log(fileGoodsImg.files[0].type)
        fileGoodsImg.addEventListener('change', () => {
            fileGoodsImg.nextElementSibling.innerHTML = '';
        });
    }
    if (errorAddGoods.length == 0) {
        formAddGoods.submit();
    }
});