<?php
$_SESSION['date'] = null;
?>

<div class="container">
  <h1 class="mb-4 pb-2">Welcome to Sevent</h1>
  <div class="row">
    <div class="col-lg-8 info">
      <p>
        We offer a wide range of used cars for you to hire at a great price. You can collect your car from any of our dealerships across the UK.
        If you wish to hire a car today, you'll need to <a href="index.php?p=login">register or login</a>.
        If you have any questions, please see our <a href="index.php?p=faq">FAQ page</a>.
      </p>
    </div>
    <div class="col-lg-4 locations">
      <h2>Our locations:</h2>
      <ul class="locations-list">
        <li>London (HQ)</li>
        <li>Ipswich</li>
        <li>Bath</li>
        <li>Newcastle</li>
      </ul>
    </div>
  </div>
  <div class="col-lg-12 selection">
    <div class="prompts">
      <p>First, pick a date when you want to hire a car. Then, you are able to filter by features, if you want to.</p>
      <p>If you just want to see all the cars we have available for that specific date, leave everything blank and just click 'Search'.</p>
    </div>
    <div class="search">
      <div id='calendar'></div>
      <div class="filters-container">
        <form id="filter-form" method=post action="index.php?p=results">
            <div class="form-group min-price">
              <label for="min_price_per_day">Min Price</label>
              <select class="form-control" id="min_price_per_day" name="min_price_per_day" aria-label="min price dropdown">
                <option selected value="">Choose a minimum price</option>
                <option value="">Any</option>
                <option value="50">£50</option>
                <option value="100">£100</option>
                <option value="150">£150</option>
                <option value="200">£200</option>
                <option value="250">£250</option>
              </select>
            </div>
            <div class="form-group max-price">
              <label for="max_price_per_day">Max Price</label>
              <select class="form-control" id="max_price_per_day" name="max_price_per_day" aria-label="max price dropdown">
                <option selected value="">Choose a maximum price</option>
                <option value="">Any</option>
                <option value="100">£100</option>
                <option value="150">£150</option>
                <option value="200">£200</option>
                <option value="250">£250</option>
                <option value="300">£300</option>
              </select>
            </div>
            <div class="form-group fuel-type">
              <label for="fuel_type">Fuel Type</label>
              <select class="form-control" id="fuel_type" name="fuel_type" aria-label="fuel type dropdown">
                <option selected value="">Choose a fuel type</option>
                <option value="">Any</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="LPG">LPG</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
              </select>
            </div>
            <div class="form-group transmission-type">
              <label for="transmission_type">Transmission Type</label>
              <select class="form-control" id="transmission_type" name="transmission_type" aria-label="transmission type dropdown">
                <option selected value="">Choose a transmission type</option>
                <option value="">Any</option>
                <option value="Manual">Manual</option>
                <option value="Automatic">Automatic</option>
                <option value="Semi-automatic">Semi-automatic</option>
              </select>
            </div>
            <div class="button-container">
              <button type="submit" name="filter" value="1" class="btn getEvents btn-sevent">Search</button>
            </div>
            </div>
        </form>
      </div>
      <div class="image">
        <img src="./images/red-car.png" />
      </div>
    </div>
  </div>
</div>
