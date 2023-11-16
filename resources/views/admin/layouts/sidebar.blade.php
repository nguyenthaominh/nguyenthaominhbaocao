<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown active">
        <a href="{{ route('admin.dashboard') }}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Starter</li>
      <li class="dropdown {{ setActive(['admin.category.*','admin.sub-category.*','admin.child-category']) }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Quản lý danh mục</span></a>
        <ul class="dropdown-menu">
          <li><a class="{{ setActive(['admin.category.*']) }}" class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
          <li><a class="{{ setActive(['admin.sub-category.*']) }}" class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
          <li><a class="{{ setActive(['admin.child-category.*']) }}" class="nav-link" href="{{ route('admin.child-category.index') }}">Child Category</a></li>
        </ul>
      </li>

      <li class="dropdown {{ setActive([
        'admin.brand.*',
        'admin.products.*',
        'admin.products-image-gallery.*',
        'admin.products.variant.*',
        'admin.products.variant-item.*'
        ]) }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Quản lý sản phẩm</span></a>
        <ul class="dropdown-menu">
          <li><a class="{{ setActive(['admin.brand.*']) }}" class="nav-link" href="{{ route('admin.brand.index') }}">Thương hiệu</a></li>
          <li class="{{ setActive([
            'admin.products.*',
            'admin.products.image-gallery.*',
            'admin.products.variant.*',
            'admin.products.variant-item.*',
            'admin.seller-products.*',
            'admin.seller-pending-products.*'
            ]) }}"> <a class="nav-link" href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
          <li><a class="{{ setActive(['admin.seller-products.*']) }}" class="nav-link" href="{{ route('admin.seller-products.index') }}">Sản phẩm nhà bán hàng</a></li>
          <li><a class="{{ setActive(['admin.seller-pending-products.*']) }}" class="nav-link" href="{{ route('admin.seller-pending-products.index') }}">Sản phẩm tạm dừng</a></li>
        </ul>
      </li>
      <li class="dropdown {{ setActive([
        'admin.vendor-profile.*',
        'admin.coupons.*',
        'admin.shipping-rule.*',
        'admin.payment-settings.*',
        ]) }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Quản lý bán hàng</span></a>
        <ul class="dropdown-menu">
          <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
          <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link" href="{{ route('admin.coupons.index') }}">Phiếu giảm giá</a></li>
          <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link" href="{{ route('admin.shipping-rule.index') }}">Phương thức vận chuyển</a></li>
          <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Hồ sơ nhà bán hàng</a></li>
          <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link" href="{{ route('admin.payment-settings.index') }}">Phương thức thanh toán</a></li>
        </ul>
      </li>
      <li
      class="dropdown {{ setActive([

          'admin.order.*',
          'admin.pending-orders',
          'admin.processed-orders',
          'admin.dropped-off-orders',
          'admin.shipped-orders',
          'admin.out-for-delivery-orders',
          'admin.delivered-orders',
          'admin.canceled-orders',
      ]) }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
          <span>Quản lý đơn hàng</span></a>
      <ul class="dropdown-menu">
          <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"href="{{ route('admin.order.index') }}">Tất cả đơn hàng</a></li>
          {{-- <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
          <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"href="{{ route('admin.processed-orders') }}">All processed Orders</a></li>
          <li class="{{ setActive(['admin.dropped-off']) }}"><a class="nav-link" href="{{ route('admin.dropped-off-orders') }}">All Dropped Off Orders</a></li>
          <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link" href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
          <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link" href="{{ route('admin.out-for-delivery-orders') }}">All Out For Delivery Orders</a></li>
          <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link"href="{{ route('admin.delivered-orders') }}">All Delivered Orders</a></li>
          <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"href="{{ route('admin.canceled-orders') }}">All Canceled Orders</a></li> --}}
      </ul>
      
  </li>
      <li class="dropdown {{ setActive(['admin.slider.*']) }}" ">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Quản lý website</span></a>
        <ul class="dropdown-menu">
          <li><a class="{{ setActive(['admin.slider.*']) }}" class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a></li>
          <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>
        </ul>
      </li>

      <li class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.index']) }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i> <span>Quản lý bài viết </span></a>
      <ul class="dropdown-menu">

          <li class="{{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                  href="{{ route('admin.blog-category.index') }}">Categories</a></li>
          <li class="{{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                  href="{{ route('admin.blog.index') }}">Blogs</a></li>
          {{-- <li class="{{ setActive(['admin.blog-comments.index']) }}"><a class="nav-link"
                  href="{{ route('admin.blog-comments.index') }}">Blog Comments</a></li> --}}
      </ul>
  </li>
          <li><a class="nav-link" href="{{ route('admin.contact.index') }}"><i class="far fa-square"></i> <span>Quản lý liên hệ</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i> <span>Quản lý khách hàng</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="far fa-square"></i> <span>Quản lý thành viên</span></a></li>

          <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i> <span>Cài đặt chung</span></a></li>
      {{-- <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
      </li> --}}
      {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
    </ul>      
  </aside>
</div>