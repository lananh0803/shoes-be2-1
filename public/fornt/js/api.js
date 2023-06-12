

const productList = document.querySelector('#product-list');
const paginate = document.querySelector('.store-pagination');
const brand = document.querySelectorAll("input[name='brands']");
const category = document.querySelectorAll("input[name='categories']");
const sort = document.querySelectorAll("input[name='arrange']");
function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
let nextPageUrl = '';
let previousPageUrl = '';
let currentPage = 1;
let selectedBrands = [];
let selectedCategories = [];
let sortValue = 0;
sort.forEach(e => {
    e.addEventListener('change', function () {
        if (this.checked) {
            sortValue = this.value;
            currentPage = 1;
            getProductsByBrand(selectedBrands,selectedCategories,sortValue,currentPage);
        }
    });
});

brand.forEach(element => {
    element.addEventListener('change', function () {
        selectedBrands = [...document.querySelectorAll("input[name='brands']:checked")].map(e => e.value);
        currentPage = 1; // Reset the current page when brand selection changes
        getProductsByBrand(selectedBrands,selectedCategories,sortValue,currentPage);
    });
});
category.forEach(element => {
    element.addEventListener('change', function () {
        selectedCategories = [...document.querySelectorAll("input[name='categories']:checked")].map(e => e.value);
        currentPage = 1; // Reset the current page when brand selection changes
        getProductsByBrand(selectedBrands,selectedCategories,sortValue,currentPage);
    });
});

async function getProductsByBrand(arrBrandId,arrCategoryId,sortValue, page = 1,nextPage) {
    const baseUrl = 'http://127.0.0.1:8000/';
    const relativeUrl =  nextPage || 'api/getProductListFilte';
    const absoluteUrl = new URL(relativeUrl, baseUrl).toString();
    const data = {
        arrBrandId: arrBrandId,
        arrCategoryId: arrCategoryId,
        sortValue: sortValue,
        page: page
    };

    // Buoc 1: Gui request
    const response = await fetch(absoluteUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });

    // Buoc 2: Xu ly ket qua
    const result = await response.json();
    previousPageUrl = result.prev_page_url;
    nextPageUrl = result.next_page_url;
    productList.innerHTML = '';
    result.data.forEach(element => {
        const product = `
            <div class="col col-md-4 col-sm-6 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="fornt/img/sneaker_airforce1.jpg" alt="">
                        <div class="product-label">
                            <span class="sale">-${element.discount}%</span>
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="productDetail/${ element.id}"> ${ element.name.substring(0, 25)}...</a></h3>
                        <h4 class="product-price">${element.discount > 0 ? formatNumber(element.price - (element.price * element.discount / 100)) : formatNumber(element.price)} đ <br>
                            ${element.discount > 0 ? '<del class="product-old-price">' +formatNumber(element.price) + ' đ</del>' : ''}
                        </h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        `;
        productList.innerHTML += product;
    });
    if(nextPageUrl == null){
        paginate.innerHTML = '';
    }
    else{
        paginate.innerHTML = '';
        const li = document.createElement('li');
        li.classList.add("next");
        const i = document.createElement('i');
        i.classList.add("fa","fa-angle-right");
        li.appendChild(i);
        paginate.appendChild(li);
        const next = document.querySelector('.next');
        next.addEventListener('click', function(e) {
            currentPage++;
            page++;
            e.preventDefault();
            getProductsByBrand(selectedBrands,selectedCategories,sortValue, currentPage, nextPageUrl);
          });
    }
    
    
    if(previousPageUrl != null ){
        const li = document.createElement('li');
        li.classList.add("prev");
        const i = document.createElement('i');
        i.classList.add("fa","fa-angle-left");
        li.appendChild(i);
        paginate.prepend(li);
        const prev = document.querySelector('.prev');
        prev.addEventListener('click', function(e) {
            currentPage--;
            page--;
            e.preventDefault();
            getProductsByBrand(selectedBrands, selectedCategories,currentPage,sortValue, previousPageUrl);
          });
    }
}

const qty = document.querySelector('input[type="number"]');
const btnup = document.querySelector('.qty-up');
const btndown = document.querySelector('.qty-down');
const price = document.querySelector('input[name="price"]');
const total = document.querySelector('input[name="total"]');
const totalPrice = document.querySelector('#total-price');
const totalAll = document.querySelectorAll('input[name="total"]');
const totalprice = document.querySelector('.price');
let lastTotal = 0;
let sumTotal = 0;
btnup.addEventListener('click', function () {
    lastTotal = (parseInt(price.value) * (parseInt(qty.value) + 1));
    total.value = lastTotal;
    totalPrice.innerHTML = '';
    const strong = document.createElement('strong');
    strong.textContent = formatNumber(lastTotal) + " đ";
    totalPrice.appendChild(strong);
    TotalCheckOut();
})

btndown.addEventListener('click', function () {
    lastTotal = (parseInt(price.value) * (parseInt(qty.value) - 1));
    total.value = lastTotal;
    totalPrice.innerHTML = '';
    const strong = document.createElement('strong');
    strong.textContent = formatNumber(lastTotal) + " đ";
    totalPrice.appendChild(strong);
    TotalCheckOut();
})

function TotalCheckOut(){
    sumTotal = 0;
    totalAll.forEach(element => {
        sumTotal += parseInt(element.value);
    });
    totalprice.textContent = formatNumber(sumTotal) + " đ";
}