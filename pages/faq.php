
<div class="container">
    <h1 class="mb-4 pb-2">Frequently Asked Questions (FAQs)</h1>
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Where are you located?
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    We have four UK locations: Bath, Ipswich, London and Newcastle.
                    If you buy a car online, you can collect it from any of our locations.
                    <div id='map'></div>
                    <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiamFtaWUtbGVpZ2giLCJhIjoiY2t3cGV2Ymx0MDh0bzJ1cnRhcGduNGJqYiJ9.atGN7v9atiuCwDxcz1HCiw';
                    const map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/jamie-leigh/ckwpfte9o912714p482u4ddrb',
                        center: [-1.4, 53.2],
                        zoom: 4.3
                    });
                    </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Do I have to sign up to buy a car?
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Yes. In order to add a car to your basket, you'll need to first register for an account and sign in.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                What if I don't like the car after I've bought it? Can I return it?
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    You can return any car within 30 days of buying it, as long as the condition is the same as how we sold it to you.
                </div>
            </div>
        </div>
    </div>
</div>