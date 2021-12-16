
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
                    We have four UK locations: Bath, Ipswich, London and Newcastle. Our opening hours are 9am-5pm, 7 days a week.
                    If you hire a car online, you can collect it from any of our locations.
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
                Do I have to sign up to hire a car?
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
                How can I contact you?
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    You can contact us at any time using our email address: <a href="mailto:help@sevent.com">help@sevent.com</a>.
                    We will aim to get back to you within 2 working days.
                    You can also ring us on 0123456789, or you can pop into one of our forecourts when we're open (see the first FAQ for details).
                </div>
            </div>
        </div>
    </div>
</div>