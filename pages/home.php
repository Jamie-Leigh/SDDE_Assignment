<?php
$_SESSION['dates'] = null;
?>

<div class="container">
  <h1 class="mb-4 pb-2">Welcome to Sevent</h1>
  <div class="row">
    <div class="col-lg-8 filter-container">
      <p>
        We offer a wide range of used cars for you to hire at a great price. You can collect your car from any of our dealerships across the UK.
        If you wish to hire a car today, you'll need to <a href="index.php?p=login">register or login</a>.
        If you have any questions, please see our <a href="index.php?p=faq">FAQ page</a>.
      </p>
      <br />
      <p>Or, you can refine your search using the filters below.</p>
      <p>If you just want to see all the cars we have available, leave the filters blank and click 'Search'.</p>
      <div class="filters">
      <div id='calendar'></div>
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
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="LPG">LPG</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
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
                <option value="Manual">Manual</option>
                <option value="Automatic">Automatic</option>
                <option value="Semi-automatic">Semi-automatic</option>
              </select>
            </div>
            </div>
            <button type="submit" name="filter" value="1" class="btn getEvents btn-sevent">Search</button>
        </form>
      </div>
    <div class="col-lg-4">
      <h2>Our locations:</h2>
      <ul>
        <li>London (HQ)</li>
        <li>Ipswich</li>
        <li>Bath</li>
        <li>Newcastle</li>
      </ul>
      
  </div>
</div>
