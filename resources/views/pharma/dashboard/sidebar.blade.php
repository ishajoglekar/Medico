<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

        <li class="sub-menu mt">
            <a href="{{route('manufacturer.requests')}}">
              <i class="fa fa-users"></i>
              <span>Manufacturers</span>
              </a>
          </li> 
          <li class="sub-menu">
            <a href="{{route('products.index')}}">
              <i class="fa fa-th"></i>
              <span>Products</span>
              </a>
          </li>
          <li class="sub-menu ">
            <a href="javascript:;">
              <i class="fa fa-cog"></i>
              <span>Categories</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('categories.create')}}">Add Catgeory</a></li>
              <li><a href="{{route('categories.index')}}">Manage Categories</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="{{route('subcategories.index')}}">
              <i class="fa fa-pencil"></i>
              <span>Subcategories</span>
              </a>
          </li>
        
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-barcode"></i>
              <span>Coupons</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('coupons.create')}}">Add Coupon</a></li>
              <li><a href="{{route('coupons.index')}}">Manage Coupons</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
