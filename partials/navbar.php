<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/"><span class="far fa-images"></span> Framed</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if(PAGE_TITLE == 'Home') echo 'active'; ?>" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(PAGE_TITLE == 'About') echo 'active'; ?>" href="">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(PAGE_TITLE == 'Store') echo 'active'; ?>" href="">Store</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true): ?>
        <li class="nav-item">
          <a href=""><span class="navbar-text"><span class="fas fa-user"></span> <?php echo $_SESSION['username']; ?></span></a>
        </li>
        <li class="nav-item d-flex align-items-center">
          <a href="" class="fa-layers fa-fw nav-link">
            <span class="fas fa-shopping-cart"></span>
            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
              <span class="fa-layers-counter" style="background:Tomato"></span>
            <?php endif; ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""><span title="View your favorites" class="fas fa-heart"></span></a>
        </li>
        
      <?php else: ?>
        <div class="ml-auto">
          <a class="btn btn-secondary navbar-btn" href="/login/">Sign In</a>
          <a class="btn btn-success navbar-btn" href="">Register</a>
        </div>
      <?php endif; ?>
    </ul>
  </div>
</nav>