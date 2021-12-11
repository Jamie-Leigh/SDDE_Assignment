<div class="container">
  <h1 class="mb-4 pb-2">Welcome to YouBuyAnyCar</h1>
  <div class="row">
    <div class="col-lg-8 filter-container">
      <p>
        We offer a wide range of used cars for you to buy at a great price. You can collect your car from any of our dealerships across the UK.
        If you wish to buy a car today, you'll need to <a href="index.php?p=login">register or login</a>.
        If you have any questions, please see our <a href="index.php?p=faq">FAQ page</a>.
      </p>
      <p>If you know what make of car you're after, type it into the search box below:</p>
      <form action="index.php?p=results" class="search" method="post" class="d-flex">
        <input class="form-control search mr-sm2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-ybac" type="submit">Search</button>
      </form>
      <br />
      <p>Or, you can refine your search using the filters below.</p>
      <p>If you just want to see all the cars we have available, leave the filters blank and click 'Search'.</p>
      <div class="filters">
        <form id="filter-form" method=post action="index.php?p=results">
            <div class="form-group min-price">
              <label for="min_price">Min Price</label>
              <select class="form-control" id="min_price" name="min_price" aria-label="min price dropdown">
                <option selected value="">Choose a minimum price</option>
                <option value="">Any</option>
                <option value="1500">£1500</option>
                <option value="3000">£3000</option>
                <option value="5000">£5000</option>
                <option value="7500">£7500</option>
                <option value="10000">£10000</option>
              </select>
            </div>
            <div class="form-group max-price">
              <label for="max_price">Max Price</label>
              <select class="form-control" id="max_price" name="max_price" aria-label="max price dropdown">
                <option selected value="">Choose a maximum price</option>
                <option value="">Any</option>
                <option value="1500">£1500</option>
                <option value="3000">£3000</option>
                <option value="5000">£5000</option>
                <option value="7500">£7500</option>
                <option value="10000">£10000</option>
              </select>
            </div>
            <div class="form-group fuel-type">
              <label for="fuel_type">Fuel Type</label>
              <select class="form-control" id="fuel_type" name="fuel_type" aria-label="fuel type dropdown">
                <option selected value="">Choose a fuel type</option>
                <option value="">Any</option>
                <option>Petrol</option>
                <option>Diesel</option>
                <option>LPG</option>
                <option>Electric</option>
                <option>Hybrid</option>
              </select>
            </div>
            <div class="form-group min-mileage">
              <label for="min_mileage">Min Mileage</label>
              <select class="form-control" id="min_mileage" name="min_mileage" aria-label="Min mileage dropdown">
                <option selected value="">Choose a minimum mileage</option>
                <option value="">Any</option>
                <option value="10000">10000</option>
                <option value="30000">30000</option>
                <option value="50000">50000</option>
                <option value="75000">75000</option>
                <option value="100000">100000</option>
              </select>
            </div>
            <div class="form-group max-mileage">
              <label for="max_mileage">Max Mileage</label>
              <select class="form-control" id="max_mileage" name="max_mileage" aria-label="max mileage dropdown">
                <option selected value="">Choose a maximum mileage</option>
                <option value="">Any</option>
                <option value="15000">15000</option>
                <option value="35000">35000</option>
                <option value="55000">55000</option>
                <option value="80000">80000</option>
                <option value="150000">150000</option>
              </select>
            </div>
            <div class="form-group transmission-type">
              <label for="transmission_type">Transmission Type</label>
              <select class="form-control" id="transmission_type" name="transmission_type" aria-label="transmission type dropdown">
                <option selected value="">Choose a transmission type</option>
                <option value="">Any</option>
                <option>Manual</option>
                <option>Automatic</option>
                <option>Semi-automatic</option>
              </select>
            </div>
            </div>
            <button type="submit" name="filter" value="1" class="btn btn-ybac">Search</button>
        </form>
      </div>
    <div class="col-lg-4">
      <h2>Our locations:</h2>
      <div id='map' aria-label="Interactive map to show locations"></div>
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
