async function elementUpdate(selector) {
    try {
        let html = await (await fetch(location.href)).text();
        let newdoc = new DOMParser().parseFromString(html, 'text/html');
        document.querySelector(selector).outerHTML = newdoc.querySelector(selector).outerHTML;
        console.log('Элемент '+selector+' был успешно обновлен');
        return true;
    } catch(err) {
        console.log('При обновлении элемента '+selector+' произошла ошибка:');
        console.dir(err);
        return false;
    }
}
function my_reload(){
    setTimeout(function(){
        location.reload();
    }, 300)
}


$('.log_button').click(function(e){
        e.preventDefault();
        let login = $('input[name="login"]').val();
        let password = $('input[name="pass"]').val();

        $.ajax({
            url: '../vendor/SignIn.php',
            type: 'POST',
            dataType: 'json',
            data: {
                login: login,
                pass: password
            },
            success (data) {
                if (data.status === true){
                    document.location.href = '../Pages/CabinetPage.php';
                }
                else{
                    $('.message').text(data.message);
                }
            }
        });
});

$('.reg_button').click(function(e){
    e.preventDefault();
    let login = $('input[name="login"]').val();
    let pass = $('input[name="pass"]').val();
    let pass_confirm = $('input[name="pass_confirm"]').val();
    let email = $('input[name="e-mail"]').val();
    let phone= $('input[name="phone"]').val();

    $.ajax({
        url: '../vendor/SignUp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
            pass_confirm: pass_confirm,
            email: email,
            phone: phone    
        },
        success(data){
            if (data.status === true){
                document.location.href = '../Pages/SignInPage.php';
            }
            else {
                $('.message').text(data.message);
            }
        }
    });
});

$('.AddToCart').click(function(e){
    e.preventDefault();
    let productID = e.target.id;

    $.ajax({
        url: '../vendor/AddToCart.php',
        type: 'POST',
        dataType: 'text',
        data: {
            productID: productID
        }
    });
});

$('.Delete').click(function(e){
    e.preventDefault();
    let productID = e.target.id;

    $.ajax({
        url: '../vendor/DeletePosition.php',
        type: 'POST',
        dataType: 'json',
        data: {
            productID: productID
        },
        success(data) {
            if (data.status === true){
                document.location.href = '../Pages/Cart.php';
                $('.sum').html(`сумма: ${data.sum} ₽`);
            }
        }
    });
});

$('input[name="quantity"]').on("change", function(e) {
    e.preventDefault();
    let quantity = e.target.valueAsNumber,
        productID = e.target.id;

    $.ajax({
        url: '../vendor/ChangeQuantity.php',
        type: 'POST',
        dataType: 'json',
        data: {
            quantity: quantity,
            productID: productID
        },

        success(data) {
            $('.sum').html(`сумма: ${data.sum} ₽`);
        }
    });
});

$('.Order').click(function(e){
    e.preventDefault();
    let sum = $("div.total").html();
    $.ajax({
        url: '../vendor/Order.php',
        type: 'POST',
        dataType: 'json',
        data: {
            sum: sum
        },
    success(data) {
        if (data.status){
            alert('Ваш заказ принят в обработку, для получения подойдите к кассиру и назовите свое номер телефона');
            document.location.href = '/index.php';
        }
        else{
            alert('Ваша корзина пуста!');
        }
    }
    });
});


$(document).ready(function (e) {
    $('#AddProductFields').on('submit', function (e) {
     e.preventDefault();
     let formData = new FormData(this);
 
     $.ajax({
      type: 'POST',
      url: '/vendor/AddNewProduct.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
     })
     location.reload();
    })
});

$(document).ready(function (e) {
    $('#DeleteProductFields').on('submit', function (e) {
     e.preventDefault();
     let formData = new FormData(this);
 
     $.ajax({
      type: 'POST',
      url: '/vendor/DeleteProduct.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,     
    })
    location.reload();
    })
});

$(document).ready(function (e) {
    $('#EditProductFields').on('submit', function (e) {
     e.preventDefault();
     let formData = new FormData(this);
 
     $.ajax({
      type: 'POST',
      url: '/vendor/EditProduct.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,     
    })
    location.reload();
    })
});

$('select[name = "orderStatus"]').on('change', function() {
    let orderStatus = this.value;
    let orderID = this.id;

    $.ajax({
        url: '/vendor/CashierOrderHistory.php',
        type: 'POST',
        dataType: 'json',
        data: {
            orderStatus: orderStatus,
            orderID: orderID
        },
    });
});

$('.hideButton').click(function(e){
    e.preventDefault();
    let targetID = e.target.id;
    let hideButton = 'AddToCart' + targetID;
    $("#")
});