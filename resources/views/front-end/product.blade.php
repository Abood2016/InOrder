
@section('content')

	<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{route('landing.index')}}">Home</a></li>
							<li><a>
							@if(empty($product->category->name))	
								<span style="color: red">Product dosn't have Category</span> 
								@else
								{{ $product->category->name }}
								@endif	
							</a></li>
							<li class="active">{{$product->name}}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

<div class="section">
<!-- container -->
<div class="container">
	<!-- row -->
	<div class="row">
		<!-- Product main img -->
		<div class="col-md-5 col-md-push-2">
			<div id="product-main-img">
				<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
				</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
			</div>
		</div>
		<!-- /Product main img -->

		<!-- Product thumb imgs -->
	<div class="col-md-2  col-md-pull-5">
		<div id="product-imgs">
			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
		</div>
	</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
		<div class="col-md-5">
			<div class="product-details">
				<h2 class="product-name">{{$product->name}}</h2>
				<div>
					<div class="product-rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<a class="review-link" >10 Review(s) | Add your review</a>
				</div>
				<div>
					<h4 class="product-price">
					@if($product->price_offer)
					 {{$product->price_offer}}	
					 <del class="product-old-price">
						{{$product->price}}
					 </del>
					 @else
						{{$product->price}}
					@endif
					</h4>
					
					<span class="product-available">{!! $stockLevel !!}</span>
				</div>
				<p>{!!  $product->details !!}</p>

				<div class="product-options">
					<label>
						Size
					<select name="sizes[]" class="form-control">
							@foreach($sizes as $size)
                  <option value="{{ $size->id }}"
				  @foreach($product->sizes as $productSize)
                         @if($productSize->id == $size->id)
                                    selected
                           @endif
                          @endforeach>{{ $size->size }}
                    </option>
                   @endforeach
              </select>
					</label>
					<label>
						Color
						<select name="colors[]" class="form-control ">
						@foreach($colors as $color)
                  <option value="{{ $color->id }}"
				   @foreach($product->colors as $productColor)
                         @if($productColor->id == $color->id)
                                    selected
                           @endif
                          @endforeach>{{ $color->color_name }}
                    </option>
                   @endforeach
						</select>
					</label>
				</div>
				@if ($product->quantity > 0)
							<div class="add-to-cart">
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$product->id}}">
										<input type="hidden" name="name" value="{{$product->name}}">
										<input type="hidden" name="price_offer" value="{{$product->price_offer}}">
										<input type="hidden" name="price" value="{{$product->price}}">
										<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</form>
								</div>
							@endif
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="{{route('product.category',['id'=>$product->category->id])}}">
								@if(empty($product->category->name))	
								<span style="color: red">Product dosn't have Category</span> 
								@else
								{{ $product->category->name }}
								@endif
								</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{$product->description}}</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
			@foreach($relatedProduct as $relatedproduct)
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('/admin_uploads/product').'/'.$relatedproduct->image}}" alt="">
						<div class="product-label">
							@if($relatedproduct->discount_value)
							<span class="sale">
								{{ $relatedproduct->discount_value }}%
							</span>
							@endif	
							
							@if ($product->product_new)
									<span class="new">
										New
									</span>
								@endif
						</div>
					</div>
					<div class="product-body">
						<p class="product-category">
						@if(empty($relatedproduct->category->name))
						<span style="color: red">Product dosn't have Category</span> 
							@else
							{{$relatedproduct->category->name}}
							@endif	
						</p>
						<h3 class="product-name"><a href="#">{{$relatedproduct->name}}</a></h3>
					
				<h4 class="product-price">
							@if($relatedproduct->price_offer)
							{{$relatedproduct->price_offer}}	
						<del class="product-old-price">
								{{$relatedproduct->price}}
						</del>
							@else
								{{$relatedproduct->price}}
							@endif
				</h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
						</div>
					</div>
					<div class="add-to-cart">
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$relatedproduct->id}}">
										<input type="hidden" name="name" value="{{$relatedproduct->name}}">
										<input type="hidden" name="price_offer" value="{{$relatedproduct->price_offer}}">
										<input type="hidden" name="price" value="{{$relatedproduct->price}}">
										<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</form>
								</div>
				</div>
			</div>

					<div class="clearfix visible-sm visible-xs"></div>

				@endforeach	
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

@endsection

@include('front-end.layouts.app')
