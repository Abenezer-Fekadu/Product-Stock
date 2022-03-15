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

            output += `
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center"> 
                    <div class="d-flex flex-column ml-1 comment-profile">
                        <span class="username">${product.name}</span>
                    </div>
                </div>
                <div class="">
                    <span class="price"> $${product.price}</span>
                </div>
                <div class="date"> 
                    <span class="text-muted">${date.toLocaleDateString()}</span> 
                </div>
            </div>
            <hr>
            `;
            interest.innerHTML = output;
        }
    } else {
        output += `            
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center"> 
                <div class="d-flex flex-column ml-1 comment-profile">
                    <span class="username">${product.name}</span>
                </div>
            </div>
            <div class="">
                <span class="price"> $${product.price}</span>
            </div>
            <div class="date"> 
                <span class="text-muted">${product.created_at}</span> 
            </div>
        </div>
        <hr>
        `;

        interest.innerHTML = output;
    }

    if (state) {
        intBtn.innerHTML = "Hide";
    } else {
        intBtn.innerHTML = "View";
        interest.innerHTML = "";
    }
}

$("#lightSlider").lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9,
});
