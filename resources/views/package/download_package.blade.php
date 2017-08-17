<div class="carousel-inner">

   <div class="item active">
      <img src=<?php echo public_path().'/Packages/'.$package->image; ?> width="100%">
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="col-md-6"><b>Package Name:</b> {{ $package->name }}</h3>
            <div class="col-md-6">
              <h3 class="pull-right"><b>Package Price:</b> {{ $package->price }}</h3>
            </div>
        </div>
        <div class="col-md-12 package-info">
            <h2>Package Information</h2>

            <div class="package-description">
                <?php echo $package->information; ?>
            </div>
        </div>

    </div>

</div>