<?php 
interface ViewCards {
  public function Sort($offset,$no_of_records_per_page);
  public function wishlist($IDArray);
  public function AddToWishlist($WishListValue);
}