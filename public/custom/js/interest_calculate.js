// UI Vars
const interest = document.getElementById("interest");
const intBtn = document.getElementById("intBtn");
var state = false;

function calculate_interest(product) {
    state = !state;
    // Added Date
    productDate = Date.parse(product.created_at);
    // Todays Date
    today = Date.now();

    // Difference
    difference = today.valueOf() - productDate.valueOf();

    // difference Date
    day = new Date(difference).getDate();
    price = product.price;

    // Display variable
    let output = "";
    if (day > 2) {
        for (var i = 0; i < day; i++) {
            date = new Date(productDate);

            date.setDate(date.getDate() + i + 1);
            price += product.price * (0.2 / 10);

            output += `<div class="card-body">
                <div class="row">
                <div class="col-md-2">
                    <img src="../../storage/main_product/${
                        product.main_image
                    }" class="img-fluid" alt="${product.name}">
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">${product.name}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${product.category}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${product.description}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${product.address}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">$${price}</p>
                </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <p class="text-muted mb-0 small">20% interest</p>
                </div>
                <div class="col-md-10">

                    <div class="d-flex justify-content-around mb-1">
                    <p class="text-muted mt-1 mb-0 small ms-xl-5">${date.toLocaleDateString()}</p>
                    <p class="text-muted mt-1 mb-0 small ms-xl-5">updated</p>
                    </div>
                </div>
                </div>
            </div>
            `;
            interest.innerHTML = output;
        }
    } else {
        output += `<div class="card-body">
            <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('storage/main_product/'.${product.main_image} )}}" class="img-fluid" alt="${product.name}">
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0">${product.name}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">${product.category}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">${product.description}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">${product.address}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">${$product.price}</p>
            </div>
            </div>
            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
            <div class="row d-flex align-items-center">
            <div class="col-md-2">
                <p class="text-muted mb-0 small">Track Order</p>
            </div>
            <div class="col-md-10">

                <div class="d-flex justify-content-around mb-1">
                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivery</p>
                <p class="text-muted mt-1 mb-0 small ms-xl-5">${product.status}</p>
                </div>
            </div>
            </div>
        </div>
        `;

        interest.innerHTML = output;
    }

    if (state) {
        intBtn.innerHTML = "Hide";
    } else {
        intBtn.innerHTML = "Interest";
        interest.innerHTML = "";
    }
}
