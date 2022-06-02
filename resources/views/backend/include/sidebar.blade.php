   <div class="border-right" id="sidebar-wrapper">
       <div class="sidebar-heading text-center">
           <img src="{{ asset('frontend/images/Hello Kitchen.png')}}" alt="" class="my-4" width="200px" />
       </div>
       <div class="list-group list-group-flush">
           <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
           <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action">My Products</a>
           <a href="{{ route('product-galleries.index') }}" class="list-group-item list-group-item-action">Product
               Galleries</a>
           <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Category</a>
           <a href="{{ route('transaction.index') }}" class="list-group-item list-group-item-action">Transactions</a>
       </div>
   </div>
