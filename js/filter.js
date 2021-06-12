// !filter->index page
// box restourant collection

if (document.getElementById('mainAll') != null) {
    const buttonAll = document.getElementById('mainAll');
    const restCollection = document.querySelectorAll('.main__restorants-box');
    buttonAll.addEventListener('click', () => {
        restCollection.forEach((elem) => {
            elem.style.display = 'block';
        });
    });

    // category button
    const categoryButton = document.querySelectorAll('.main-category');
    categoryButton.forEach((elemCategoryRest) => {
        elemCategoryRest.addEventListener('click', () => {
            const categoryRest = elemCategoryRest.getAttribute('data-category');
            console.log(categoryRest);
            restCollection.forEach((elemRestBox) => {
                if (elemRestBox.querySelector('.main__restorants-box-category').getAttribute('data-boxCategory') == categoryRest) {
                    elemRestBox.style.display = 'block';
                    console.log(elemRestBox.querySelector('.main__restorants-box-category').getAttribute('data-boxCategory'));
                } else {
                    elemRestBox.style.display = 'none';
                }
            });

        });
    });

}

// !filter-> goods page
//box goods collection
if (document.getElementById('allGoods') != null) {
    const allGoodsButton = document.getElementById('allGoods');
    console.log(allGoodsButton);
    const goodsBox = document.querySelectorAll('.goods__box');
    allGoodsButton.addEventListener('click', () => {
        goodsBox.forEach((elem) => {
            elem.style.display = 'block';
        });
    });

    // category button
    const buttonCategoryGoods = document.querySelectorAll('.category-goods-button');
    buttonCategoryGoods.forEach((categoryButton) => {
        categoryButton.addEventListener('click', () => {
            const categoryGoods = categoryButton.getAttribute('data-category');
            console.log(categoryGoods);
            goodsBox.forEach((elemGoods) => {
                if (elemGoods.getAttribute('data-categoryGoods') == categoryGoods) {
                    elemGoods.style.display = 'block';
                } else {
                    elemGoods.style.display = 'none';
                }
            });
        });
    });
}
