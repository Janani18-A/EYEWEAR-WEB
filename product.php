<?php
// product.php – Optiq Luxury Dynamic Product Page (Complete)
include 'templates/header.php';
include 'templates/navbar.php';

// ============================================================
// PRODUCT DATA – Master product array (same as before)
// ============================================================
$products = [
    // === Bestsellers (bs1–bs8) ===
    'bs1' => ['name' => 'Executive Square', 'collection' => 'Professional', 'price' => 2999, 'original_price' => 4999, 'discount' => 40, 'rating' => 4.8, 'reviews_count' => 2341, 'emi' => '₹459/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '12g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval', 'Square', 'Heart'], 'colors' => ['black', 'gold', 'silver'], 'hero_image' => 'assets/images/bs1.jpg', 'color_images' => ['black' => 'assets/images/bs1.jpg', 'gold' => 'assets/images/bs1.jpg', 'silver' => 'assets/images/bs1.jpg'], 'blueprint_image' => 'assets/images/bs1.jpg', 'reviews' => [], 'related' => ['bs2', 'bs3', 'bs5', 'bs8']],
    'bs2' => ['name' => 'Heritage Round', 'collection' => 'Vintage', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.7, 'reviews_count' => 1876, 'emi' => '₹549/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '14g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['black', 'havana', 'gold'], 'hero_image' => 'assets/images/bs2.jpg', 'color_images' => ['black' => 'assets/images/bs2.jpg', 'havana' => 'assets/images/bs2.jpg', 'gold' => 'assets/images/bs2.jpg'], 'blueprint_image' => 'assets/images/bs2.jpg', 'reviews' => [], 'related' => ['bs1', 'bs3', 'bs6', 'bs7']],
    'bs3' => ['name' => 'Crystal Clear', 'collection' => 'Minimalist', 'price' => 2499, 'original_price' => 3999, 'discount' => 38, 'rating' => 4.6, 'reviews_count' => 1543, 'emi' => '₹399/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval', 'Heart'], 'colors' => ['transparent', 'black'], 'hero_image' => 'assets/images/bs3.jpg', 'color_images' => ['transparent' => 'assets/images/bs3.jpg', 'black' => 'assets/images/bs3.jpg'], 'blueprint_image' => 'assets/images/bs3.jpg', 'reviews' => [], 'related' => ['bs4', 'bs5', 'bs1', 'bs8']],
    'bs4' => ['name' => 'AirLite Rimless', 'collection' => 'Ultra-Light', 'price' => 4999, 'original_price' => 7999, 'discount' => 38, 'rating' => 4.9, 'reviews_count' => 2100, 'emi' => '₹799/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Titanium', 'weight' => '9g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['silver', 'gold'], 'hero_image' => 'assets/images/bs4.jpg', 'color_images' => ['silver' => 'assets/images/bs4.jpg', 'gold' => 'assets/images/bs4.jpg'], 'blueprint_image' => 'assets/images/bs4.jpg', 'reviews' => [], 'related' => ['bs5', 'bs8', 'bs3', 'bs2']],
    'bs5' => ['name' => 'VisionGuard Pro', 'collection' => 'Digital', 'price' => 2799, 'original_price' => 4499, 'discount' => 38, 'rating' => 4.7, 'reviews_count' => 1320, 'emi' => '₹449/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'TR90', 'weight' => '12g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black', 'blue'], 'hero_image' => 'assets/images/bs5.jpg', 'color_images' => ['black' => 'assets/images/bs5.jpg', 'blue' => 'assets/images/bs5.jpg'], 'blueprint_image' => 'assets/images/bs5.jpg', 'reviews' => [], 'related' => ['bs6', 'bs7', 'bs8', 'bs1']],
    'bs6' => ['name' => 'Bella Cat Eye', 'collection' => 'Fashion', 'price' => 3299, 'original_price' => 5499, 'discount' => 40, 'rating' => 4.8, 'reviews_count' => 980, 'emi' => '₹529/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Heart', 'Oval'], 'colors' => ['black', 'tortoise'], 'hero_image' => 'assets/images/bs6.jpg', 'color_images' => ['black' => 'assets/images/bs6.jpg', 'tortoise' => 'assets/images/bs6.jpg'], 'blueprint_image' => 'assets/images/bs6.jpg', 'reviews' => [], 'related' => ['bs7', 'bs3', 'bs2', 'bs8']],
    'bs7' => ['name' => 'Urban Wayfarer', 'collection' => 'Street', 'price' => 3999, 'original_price' => 6499, 'discount' => 38, 'rating' => 4.7, 'reviews_count' => 2150, 'emi' => '₹649/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '14g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval', 'Square'], 'colors' => ['black', 'havana'], 'hero_image' => 'assets/images/bs7.jpg', 'color_images' => ['black' => 'assets/images/bs7.jpg', 'havana' => 'assets/images/bs7.jpg'], 'blueprint_image' => 'assets/images/bs7.jpg', 'reviews' => [], 'related' => ['bs8', 'bs5', 'bs4', 'bs1']],
    'bs8' => ['name' => 'Aviator Elite', 'collection' => 'Premium', 'price' => 5499, 'original_price' => 9999, 'discount' => 45, 'rating' => 4.9, 'reviews_count' => 3412, 'emi' => '₹659/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Titanium', 'weight' => '12g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square', 'Heart'], 'colors' => ['gold', 'silver', 'black'], 'hero_image' => 'assets/images/bs8.jpg', 'color_images' => ['gold' => 'assets/images/bs8.jpg', 'silver' => 'assets/images/bs8.jpg', 'black' => 'assets/images/bs8.jpg'], 'blueprint_image' => 'assets/images/bs8.jpg', 'reviews' => [], 'related' => ['bs1', 'bs4', 'bs7', 'bs6']],
    // Extra product for related section
    'crystal-vision' => ['name' => 'Crystal Vision', 'collection' => 'Premium', 'price' => 4499, 'original_price' => 6999, 'discount' => 36, 'rating' => 4.9, 'reviews_count' => 1800, 'emi' => '₹719/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '11g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square', 'Heart'], 'colors' => ['transparent', 'gold'], 'hero_image' => 'assets/images/new-1.jpg', 'color_images' => ['transparent' => 'assets/images/new-1.jpg', 'gold' => 'assets/images/new-1.jpg'], 'blueprint_image' => 'assets/images/new-1.jpg', 'reviews' => [], 'related' => ['bs1', 'bs4', 'bs8']],
    // Men (men‑1 to men‑10) – abbreviated for brevity, include all from original
    'men-1' => ['name' => 'Rectangle Black Metal', 'collection' => 'Men', 'price' => 2499, 'original_price' => 3999, 'discount' => 38, 'rating' => 4.5, 'reviews_count' => 800, 'emi' => '₹399/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '14g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Square', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/men-1.jpg', 'color_images' => ['black' => 'assets/images/men-1.jpg'], 'blueprint_image' => 'assets/images/men-1.jpg', 'reviews' => [], 'related' => ['bs1', 'bs2', 'bs3']],
    'men-2' => ['name' => 'Round Silver Frame', 'collection' => 'Men', 'price' => 2999, 'original_price' => 4999, 'discount' => 40, 'rating' => 4.6, 'reviews_count' => 900, 'emi' => '₹479/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '13g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['silver'], 'hero_image' => 'assets/images/men-2.jpg', 'color_images' => ['silver' => 'assets/images/men-2.jpg'], 'blueprint_image' => 'assets/images/men-2.jpg', 'reviews' => [], 'related' => ['bs1', 'bs3', 'bs5']],
    'men-3' => ['name' => 'Aviator Gold Frame', 'collection' => 'Men', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.7, 'reviews_count' => 1100, 'emi' => '₹559/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '14g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['gold'], 'hero_image' => 'assets/images/men-3.jpg', 'color_images' => ['gold' => 'assets/images/men-3.jpg'], 'blueprint_image' => 'assets/images/men-3.jpg', 'reviews' => [], 'related' => ['bs8', 'bs2', 'bs4']],
    'men-4' => ['name' => 'Wayfarer Black', 'collection' => 'Men', 'price' => 1999, 'original_price' => 2999, 'discount' => 33, 'rating' => 4.4, 'reviews_count' => 650, 'emi' => '₹329/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '15g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Square'], 'colors' => ['black'], 'hero_image' => 'assets/images/men-4.jpg', 'color_images' => ['black' => 'assets/images/men-4.jpg'], 'blueprint_image' => 'assets/images/men-4.jpg', 'reviews' => [], 'related' => ['bs7', 'bs5', 'bs1']],
    'men-5' => ['name' => 'Rimless Office Frame', 'collection' => 'Office', 'price' => 4999, 'original_price' => 7999, 'discount' => 38, 'rating' => 4.8, 'reviews_count' => 1200, 'emi' => '₹799/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Titanium', 'weight' => '9g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Heart'], 'colors' => ['silver'], 'hero_image' => 'assets/images/men-5.jpg', 'color_images' => ['silver' => 'assets/images/men-5.jpg'], 'blueprint_image' => 'assets/images/men-5.jpg', 'reviews' => [], 'related' => ['bs4', 'bs8', 'bs6']],
    'men-6' => ['name' => 'Blue Light Glasses', 'collection' => 'Computer', 'price' => 2799, 'original_price' => 4499, 'discount' => 38, 'rating' => 4.5, 'reviews_count' => 700, 'emi' => '₹449/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'TR90', 'weight' => '12g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/men-6.jpg', 'color_images' => ['black' => 'assets/images/men-6.jpg'], 'blueprint_image' => 'assets/images/men-6.jpg', 'reviews' => [], 'related' => ['bs5', 'bs2', 'bs7']],
    'men-7' => ['name' => 'Transparent Frame', 'collection' => 'Fashion', 'price' => 1999, 'original_price' => 2999, 'discount' => 33, 'rating' => 4.3, 'reviews_count' => 500, 'emi' => '₹329/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['transparent'], 'hero_image' => 'assets/images/men-7.jpg', 'color_images' => ['transparent' => 'assets/images/men-7.jpg'], 'blueprint_image' => 'assets/images/men-7.jpg', 'reviews' => [], 'related' => ['bs3', 'bs6', 'bs8']],
    'men-8' => ['name' => 'Tortoise Shell Frame', 'collection' => 'Vintage', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.7, 'reviews_count' => 950, 'emi' => '₹559/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '14g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['tortoise'], 'hero_image' => 'assets/images/men-8.jpg', 'color_images' => ['tortoise' => 'assets/images/men-8.jpg'], 'blueprint_image' => 'assets/images/men-8.jpg', 'reviews' => [], 'related' => ['bs2', 'bs6', 'bs1']],
    'men-9' => ['name' => 'Sports Sunglasses', 'collection' => 'Active', 'price' => 3999, 'original_price' => 6999, 'discount' => 43, 'rating' => 4.8, 'reviews_count' => 1300, 'emi' => '₹649/mo', 'frame_width' => 145, 'lens_width' => 55, 'bridge' => 18, 'temple' => 145, 'material' => 'TR90', 'weight' => '15g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/men-9.jpg', 'color_images' => ['black' => 'assets/images/men-9.jpg'], 'blueprint_image' => 'assets/images/men-9.jpg', 'reviews' => [], 'related' => ['sun-1', 'sun-3', 'bs8']],
    'men-10' => ['name' => 'Titanium Premium Frame', 'collection' => 'Premium', 'price' => 5999, 'original_price' => 9999, 'discount' => 40, 'rating' => 4.9, 'reviews_count' => 1500, 'emi' => '₹959/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Titanium', 'weight' => '10g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Heart'], 'colors' => ['gold'], 'hero_image' => 'assets/images/men-10.jpg', 'color_images' => ['gold' => 'assets/images/men-10.jpg'], 'blueprint_image' => 'assets/images/men-10.jpg', 'reviews' => [], 'related' => ['bs8', 'bs4', 'bs1']],
    // Women (women‑1 to women‑10) – abbreviated
    'women-1' => ['name' => 'Cat Eye Black', 'collection' => 'Women', 'price' => 3299, 'original_price' => 5499, 'discount' => 40, 'rating' => 4.8, 'reviews_count' => 1100, 'emi' => '₹529/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Heart', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/women-1.jpg', 'color_images' => ['black' => 'assets/images/women-1.jpg'], 'blueprint_image' => 'assets/images/women-1.jpg', 'reviews' => [], 'related' => ['bs6', 'bs1', 'bs3']],
    'women-2' => ['name' => 'Rose Gold Round', 'collection' => 'Women', 'price' => 2999, 'original_price' => 4999, 'discount' => 40, 'rating' => 4.7, 'reviews_count' => 950, 'emi' => '₹479/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Metal', 'weight' => '12g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['rose gold'], 'hero_image' => 'assets/images/women-2.jpg', 'color_images' => ['rose gold' => 'assets/images/women-2.jpg'], 'blueprint_image' => 'assets/images/women-2.jpg', 'reviews' => [], 'related' => ['bs2', 'bs5', 'bs8']],
    'women-3' => ['name' => 'Transparent Fashion Frame', 'collection' => 'Fashion', 'price' => 2499, 'original_price' => 3999, 'discount' => 38, 'rating' => 4.5, 'reviews_count' => 700, 'emi' => '₹399/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Acetate', 'weight' => '12g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Heart'], 'colors' => ['transparent'], 'hero_image' => 'assets/images/women-3.jpg', 'color_images' => ['transparent' => 'assets/images/women-3.jpg'], 'blueprint_image' => 'assets/images/women-3.jpg', 'reviews' => [], 'related' => ['bs3', 'bs7', 'bs6']],
    'women-4' => ['name' => 'Geometric Frame', 'collection' => 'Women', 'price' => 2799, 'original_price' => 4499, 'discount' => 38, 'rating' => 4.6, 'reviews_count' => 800, 'emi' => '₹449/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['gold'], 'hero_image' => 'assets/images/women-4.jpg', 'color_images' => ['gold' => 'assets/images/women-4.jpg'], 'blueprint_image' => 'assets/images/women-4.jpg', 'reviews' => [], 'related' => ['bs1', 'bs2', 'bs8']],
    'women-5' => ['name' => 'Blue Light Glasses', 'collection' => 'Computer', 'price' => 2999, 'original_price' => 4999, 'discount' => 40, 'rating' => 4.6, 'reviews_count' => 850, 'emi' => '₹479/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'TR90', 'weight' => '12g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/women-5.jpg', 'color_images' => ['black' => 'assets/images/women-5.jpg'], 'blueprint_image' => 'assets/images/women-5.jpg', 'reviews' => [], 'related' => ['bs5', 'bs6', 'bs3']],
    'women-6' => ['name' => 'Office Frame', 'collection' => 'Office', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.7, 'reviews_count' => 1000, 'emi' => '₹559/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Metal', 'weight' => '14g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Heart'], 'colors' => ['silver'], 'hero_image' => 'assets/images/women-6.jpg', 'color_images' => ['silver' => 'assets/images/women-6.jpg'], 'blueprint_image' => 'assets/images/women-6.jpg', 'reviews' => [], 'related' => ['bs1', 'bs4', 'bs7']],
    'women-7' => ['name' => 'Luxury Gold Frame', 'collection' => 'Premium', 'price' => 5499, 'original_price' => 9999, 'discount' => 45, 'rating' => 4.9, 'reviews_count' => 1400, 'emi' => '₹659/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Metal', 'weight' => '12g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['gold'], 'hero_image' => 'assets/images/women-7.jpg', 'color_images' => ['gold' => 'assets/images/women-7.jpg'], 'blueprint_image' => 'assets/images/women-7.jpg', 'reviews' => [], 'related' => ['bs8', 'bs1', 'bs2']],
    'women-8' => ['name' => 'Oversized Sunglasses', 'collection' => 'Sunglasses', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.8, 'reviews_count' => 1200, 'emi' => '₹559/mo', 'frame_width' => 145, 'lens_width' => 55, 'bridge' => 18, 'temple' => 145, 'material' => 'Acetate', 'weight' => '16g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/women-8.jpg', 'color_images' => ['black' => 'assets/images/women-8.jpg'], 'blueprint_image' => 'assets/images/women-8.jpg', 'reviews' => [], 'related' => ['sun-2', 'sun-5', 'bs8']],
    'women-9' => ['name' => 'Tortoise Cat Eye', 'collection' => 'Women', 'price' => 3199, 'original_price' => 5199, 'discount' => 38, 'rating' => 4.7, 'reviews_count' => 900, 'emi' => '₹519/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Heart', 'Oval'], 'colors' => ['tortoise'], 'hero_image' => 'assets/images/women-9.jpg', 'color_images' => ['tortoise' => 'assets/images/women-9.jpg'], 'blueprint_image' => 'assets/images/women-9.jpg', 'reviews' => [], 'related' => ['bs6', 'bs3', 'bs2']],
    'women-10' => ['name' => 'Rimless Frame', 'collection' => 'Ultra-Light', 'price' => 4499, 'original_price' => 7999, 'discount' => 44, 'rating' => 4.8, 'reviews_count' => 1000, 'emi' => '₹719/mo', 'frame_width' => 135, 'lens_width' => 50, 'bridge' => 17, 'temple' => 135, 'material' => 'Titanium', 'weight' => '8g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Heart'], 'colors' => ['silver'], 'hero_image' => 'assets/images/women-10.jpg', 'color_images' => ['silver' => 'assets/images/women-10.jpg'], 'blueprint_image' => 'assets/images/women-10.jpg', 'reviews' => [], 'related' => ['bs4', 'bs8', 'bs5']],
    // Kids (kids‑1 to kids‑5) – abbreviated
    'kids-1' => ['name' => 'Flexible Kids Frame', 'collection' => 'Kids', 'price' => 1299, 'original_price' => 1999, 'discount' => 35, 'rating' => 4.5, 'reviews_count' => 400, 'emi' => '₹209/mo', 'frame_width' => 120, 'lens_width' => 45, 'bridge' => 16, 'temple' => 120, 'material' => 'TR90', 'weight' => '10g', 'gender' => 'Kids', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['blue'], 'hero_image' => 'assets/images/kids-1.jpg', 'color_images' => ['blue' => 'assets/images/kids-1.jpg'], 'blueprint_image' => 'assets/images/kids-1.jpg', 'reviews' => [], 'related' => ['kids-2', 'kids-3', 'bs3']],
    'kids-2' => ['name' => 'Colorful Kids Glasses', 'collection' => 'Kids', 'price' => 1499, 'original_price' => 2299, 'discount' => 35, 'rating' => 4.6, 'reviews_count' => 350, 'emi' => '₹239/mo', 'frame_width' => 120, 'lens_width' => 45, 'bridge' => 16, 'temple' => 120, 'material' => 'TR90', 'weight' => '10g', 'gender' => 'Kids', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['multicolor'], 'hero_image' => 'assets/images/kids-2.jpg', 'color_images' => ['multicolor' => 'assets/images/kids-2.jpg'], 'blueprint_image' => 'assets/images/kids-2.jpg', 'reviews' => [], 'related' => ['kids-1', 'kids-4', 'bs5']],
    'kids-3' => ['name' => 'School Frames', 'collection' => 'Kids', 'price' => 999, 'original_price' => 1499, 'discount' => 33, 'rating' => 4.4, 'reviews_count' => 300, 'emi' => '₹159/mo', 'frame_width' => 120, 'lens_width' => 45, 'bridge' => 16, 'temple' => 120, 'material' => 'Plastic', 'weight' => '11g', 'gender' => 'Kids', 'warranty' => '1 Year', 'face_shapes' => ['Square', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/kids-3.jpg', 'color_images' => ['black' => 'assets/images/kids-3.jpg'], 'blueprint_image' => 'assets/images/kids-3.jpg', 'reviews' => [], 'related' => ['kids-5', 'kids-1', 'bs1']],
    'kids-4' => ['name' => 'Flexi-Hinge Kids', 'collection' => 'Kids', 'price' => 1799, 'original_price' => 2799, 'discount' => 36, 'rating' => 4.5, 'reviews_count' => 250, 'emi' => '₹289/mo', 'frame_width' => 120, 'lens_width' => 45, 'bridge' => 16, 'temple' => 120, 'material' => 'TR90', 'weight' => '10g', 'gender' => 'Kids', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['red'], 'hero_image' => 'assets/images/kids-4.jpg', 'color_images' => ['red' => 'assets/images/kids-4.jpg'], 'blueprint_image' => 'assets/images/kids-4.jpg', 'reviews' => [], 'related' => ['kids-2', 'kids-5', 'bs6']],
    'kids-5' => ['name' => 'Unbreakable Kids Frame', 'collection' => 'Kids', 'price' => 2199, 'original_price' => 3499, 'discount' => 37, 'rating' => 4.7, 'reviews_count' => 280, 'emi' => '₹349/mo', 'frame_width' => 120, 'lens_width' => 45, 'bridge' => 16, 'temple' => 120, 'material' => 'TR90', 'weight' => '9g', 'gender' => 'Kids', 'warranty' => '1 Year', 'face_shapes' => ['Square', 'Oval'], 'colors' => ['green'], 'hero_image' => 'assets/images/kids-5.jpg', 'color_images' => ['green' => 'assets/images/kids-5.jpg'], 'blueprint_image' => 'assets/images/kids-5.jpg', 'reviews' => [], 'related' => ['kids-3', 'kids-1', 'bs4']],
    // Sunglasses (sun‑1 to sun‑5) – abbreviated
    'sun-1' => ['name' => 'Classic Aviator Sunglasses', 'collection' => 'Sunglasses', 'price' => 2999, 'original_price' => 4999, 'discount' => 40, 'rating' => 4.7, 'reviews_count' => 1100, 'emi' => '₹479/mo', 'frame_width' => 145, 'lens_width' => 55, 'bridge' => 18, 'temple' => 145, 'material' => 'Metal', 'weight' => '14g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['gold'], 'hero_image' => 'assets/images/sun-1.jpg', 'color_images' => ['gold' => 'assets/images/sun-1.jpg'], 'blueprint_image' => 'assets/images/sun-1.jpg', 'reviews' => [], 'related' => ['sun-2', 'sun-3', 'bs8']],
    'sun-2' => ['name' => 'Polarized Wayfarer', 'collection' => 'Sunglasses', 'price' => 3499, 'original_price' => 5999, 'discount' => 42, 'rating' => 4.8, 'reviews_count' => 1200, 'emi' => '₹559/mo', 'frame_width' => 145, 'lens_width' => 55, 'bridge' => 18, 'temple' => 145, 'material' => 'Acetate', 'weight' => '15g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Square'], 'colors' => ['black'], 'hero_image' => 'assets/images/sun-2.jpg', 'color_images' => ['black' => 'assets/images/sun-2.jpg'], 'blueprint_image' => 'assets/images/sun-2.jpg', 'reviews' => [], 'related' => ['sun-4', 'sun-5', 'bs7']],
    'sun-3' => ['name' => 'UV400 Sport Sunglasses', 'collection' => 'Active', 'price' => 2499, 'original_price' => 3999, 'discount' => 38, 'rating' => 4.6, 'reviews_count' => 900, 'emi' => '₹399/mo', 'frame_width' => 150, 'lens_width' => 58, 'bridge' => 19, 'temple' => 150, 'material' => 'TR90', 'weight' => '16g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/sun-3.jpg', 'color_images' => ['black' => 'assets/images/sun-3.jpg'], 'blueprint_image' => 'assets/images/sun-3.jpg', 'reviews' => [], 'related' => ['men-9', 'sun-1', 'bs8']],
    'sun-4' => ['name' => 'Retro Round Sunglasses', 'collection' => 'Sunglasses', 'price' => 1999, 'original_price' => 2999, 'discount' => 33, 'rating' => 4.5, 'reviews_count' => 800, 'emi' => '₹329/mo', 'frame_width' => 140, 'lens_width' => 50, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '13g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['silver'], 'hero_image' => 'assets/images/sun-4.jpg', 'color_images' => ['silver' => 'assets/images/sun-4.jpg'], 'blueprint_image' => 'assets/images/sun-4.jpg', 'reviews' => [], 'related' => ['sun-2', 'sun-5', 'bs2']],
    'sun-5' => ['name' => 'Cat Eye Sunglasses', 'collection' => 'Sunglasses', 'price' => 3299, 'original_price' => 5499, 'discount' => 40, 'rating' => 4.7, 'reviews_count' => 950, 'emi' => '₹529/mo', 'frame_width' => 140, 'lens_width' => 50, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '14g', 'gender' => 'Women', 'warranty' => '1 Year', 'face_shapes' => ['Heart', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/sun-5.jpg', 'color_images' => ['black' => 'assets/images/sun-5.jpg'], 'blueprint_image' => 'assets/images/sun-5.jpg', 'reviews' => [], 'related' => ['women-8', 'bs6', 'sun-1']],
    // Computer Glasses (computer‑1 to computer‑5) – abbreviated
    'computer-1' => ['name' => 'Blue Cut Rectangle', 'collection' => 'Computer', 'price' => 2799, 'original_price' => 4499, 'discount' => 38, 'rating' => 4.6, 'reviews_count' => 1100, 'emi' => '₹449/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'TR90', 'weight' => '12g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['black'], 'hero_image' => 'assets/images/computer-1.jpg', 'color_images' => ['black' => 'assets/images/computer-1.jpg'], 'blueprint_image' => 'assets/images/computer-1.jpg', 'reviews' => [], 'related' => ['computer-2', 'computer-3', 'bs5']],
    'computer-2' => ['name' => 'Anti-Glare Round', 'collection' => 'Computer', 'price' => 2499, 'original_price' => 3999, 'discount' => 38, 'rating' => 4.5, 'reviews_count' => 950, 'emi' => '₹399/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Acetate', 'weight' => '13g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Oval'], 'colors' => ['brown'], 'hero_image' => 'assets/images/computer-2.jpg', 'color_images' => ['brown' => 'assets/images/computer-2.jpg'], 'blueprint_image' => 'assets/images/computer-2.jpg', 'reviews' => [], 'related' => ['computer-1', 'computer-4', 'bs5']],
    'computer-3' => ['name' => 'Gaming Glasses', 'collection' => 'Gaming', 'price' => 3299, 'original_price' => 5499, 'discount' => 40, 'rating' => 4.7, 'reviews_count' => 1200, 'emi' => '₹529/mo', 'frame_width' => 145, 'lens_width' => 55, 'bridge' => 18, 'temple' => 145, 'material' => 'TR90', 'weight' => '14g', 'gender' => 'Men', 'warranty' => '1 Year', 'face_shapes' => ['Round', 'Square'], 'colors' => ['black'], 'hero_image' => 'assets/images/computer-3.jpg', 'color_images' => ['black' => 'assets/images/computer-3.jpg'], 'blueprint_image' => 'assets/images/computer-3.jpg', 'reviews' => [], 'related' => ['computer-5', 'bs5', 'men-9']],
    'computer-4' => ['name' => 'Ultra-Light Computer Glasses', 'collection' => 'Computer', 'price' => 3999, 'original_price' => 6999, 'discount' => 43, 'rating' => 4.8, 'reviews_count' => 1300, 'emi' => '₹649/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Titanium', 'weight' => '9g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['silver'], 'hero_image' => 'assets/images/computer-4.jpg', 'color_images' => ['silver' => 'assets/images/computer-4.jpg'], 'blueprint_image' => 'assets/images/computer-4.jpg', 'reviews' => [], 'related' => ['bs4', 'computer-1', 'bs8']],
    'computer-5' => ['name' => 'Premium Blue Blockers', 'collection' => 'Premium', 'price' => 4999, 'original_price' => 8999, 'discount' => 44, 'rating' => 4.9, 'reviews_count' => 1400, 'emi' => '₹799/mo', 'frame_width' => 140, 'lens_width' => 52, 'bridge' => 18, 'temple' => 140, 'material' => 'Metal', 'weight' => '11g', 'gender' => 'Unisex', 'warranty' => '1 Year', 'face_shapes' => ['Oval', 'Square'], 'colors' => ['gold'], 'hero_image' => 'assets/images/computer-5.jpg', 'color_images' => ['gold' => 'assets/images/computer-5.jpg'], 'blueprint_image' => 'assets/images/computer-5.jpg', 'reviews' => [], 'related' => ['bs8', 'bs1', 'computer-3']],
];

// Fallback if product not found
$default_id = 'bs1';
if (!isset($_GET['id']) || !isset($products[$_GET['id']])) {
    $product_id = $default_id;
} else {
    $product_id = $_GET['id'];
}
$product = $products[$product_id];
?>

<!-- ============================================================ -->
<!-- 1. PRODUCT HERO – White Background + Margin Top Fix         -->
<!-- ============================================================ -->
<section class="hero-section bg-white" id="heroSection" style="padding: 100px 0 40px; position: relative; overflow: hidden; margin-top: 0;">

    <div class="container">

        <div class="row g-4 align-items-start">

            <!-- ===== LEFT: Product Image ===== -->
            <div class="col-lg-5">
                <div class="hero-img-wrapper rounded-4 overflow-hidden position-relative"
                    style="aspect-ratio: 4/5; max-width: 400px; margin: 0 auto; background: #f8f9fa; border: 1px solid rgba(0,0,0,0.04);">
                    <img src="<?= $product['hero_image'] ?>"
                        alt="<?= $product['name'] ?>"
                        class="w-100 h-100"
                        style="object-fit: contain; padding: 20px;"
                        id="heroProductImg">
                    <div class="light-streak"></div>
                </div>

                <!-- Color swatches -->
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <?php if (!empty($product['colors'])): ?>
                        <?php foreach ($product['colors'] as $color): ?>
                            <div class="color-swatch rounded-circle"
                                data-img="<?= $product['color_images'][$color] ?? $product['hero_image'] ?>"
                                style="width: 28px; height: 28px; background: <?= $color ?>; cursor: pointer; border: 2px solid #0F3D2E; transition: border-color 0.3s; border-radius: 50%;">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Size buttons -->
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <button class="btn btn-outline-emerald btn-sm size-btn active">S</button>
                    <button class="btn btn-outline-emerald btn-sm size-btn">M</button>
                    <button class="btn btn-outline-emerald btn-sm size-btn">L</button>
                </div>
            </div>

            <!-- ===== RIGHT: Product Details with Quantity ===== -->
            <div class="col-lg-7">
                <div class="text-navy">
                    <span class="badge bg-emerald text-white px-3 py-2 rounded-pill mb-3"><?= $product['collection'] ?? 'Premium' ?></span>
                    <h1 class="display-6 fw-bold mb-2" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.5rem, 4vw, 2.5rem);"><?= $product['name'] ?></h1>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-gold">★★★★★</span>
                        <span class="fw-bold" style="font-size: clamp(0.85rem, 1.2vw, 1rem);"><?= $product['rating'] ?? '4.8' ?></span>
                        <span class="text-muted" style="font-size: clamp(0.7rem, 1vw, 0.85rem);">(<?= $product['reviews_count'] ?? '0' ?> Reviews)</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                        <span class="fw-bold text-emerald" style="font-size: clamp(1.2rem, 3vw, 1.8rem);">₹<?= number_format($product['price'] ?? 2999) ?></span>
                        <span class="text-decoration-line-through text-muted" style="font-size: clamp(0.85rem, 1.5vw, 1.1rem);">₹<?= number_format($product['original_price'] ?? 4999) ?></span>
                        <span class="badge bg-emerald text-white" style="font-size: clamp(0.6rem, 0.9vw, 0.75rem);"><?= $product['discount'] ?? '40' ?>% OFF</span>
                    </div>
                    <p class="text-muted small" style="font-size: clamp(0.7rem, 1vw, 0.85rem);"><i class="bi bi-credit-card me-1"></i> EMI from <?= $product['emi'] ?? '₹459/mo' ?></p>

                    <!-- ===== QUANTITY SELECTOR + BUTTONS ===== -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mt-4">
                        <div class="quantity-selector d-flex align-items-center border rounded-pill overflow-hidden" style="border-color: #0F3D2E !important;">
                            <button class="btn btn-outline-emerald qty-btn" style="border: none; border-radius: 0; padding: clamp(2px, 0.5vw, 4px) clamp(6px, 1vw, 10px); background: transparent; font-size: clamp(0.8rem, 1.2vw, 1rem);" id="qtyMinus">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span class="fw-bold px-3" id="qtyDisplay" style="min-width: 30px; text-align: center; font-size: clamp(0.9rem, 1.2vw, 1.1rem);">1</span>
                            <button class="btn btn-outline-emerald qty-btn" style="border: none; border-radius: 0; padding: clamp(2px, 0.5vw, 4px) clamp(6px, 1vw, 10px); background: transparent; font-size: clamp(0.8rem, 1.2vw, 1rem);" id="qtyPlus">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <button class="btn btn-emerald btn-md px-4 px-md-5 add-to-cart-btn"
                            data-id="<?= $product_id ?>"
                            data-name="<?= $product['name'] ?>"
                            data-img="<?= $product['hero_image'] ?>"
                            data-price="<?= $product['price'] ?>"
                            data-color="<?= $product['colors'][0] ?? 'default' ?>"
                            data-size="medium"
                            style="font-size: clamp(0.7rem, 1.2vw, 0.9rem); padding: clamp(8px, 1.5vw, 12px) clamp(16px, 3vw, 32px);">
                            Add to Cart
                        </button>
                        <a href="order.php?id=<?= $product_id ?>" class="btn btn-outline-emerald btn-md px-4 px-md-5" style="font-size: clamp(0.7rem, 1.2vw, 0.9rem); padding: clamp(8px, 1.5vw, 12px) clamp(16px, 3vw, 32px);">Buy Now</a>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4 text-muted small" style="font-size: clamp(0.6rem, 0.9vw, 0.8rem);">
                        <span><i class="bi bi-check-circle-fill text-emerald me-1"></i>100% Authentic</span>
                        <span><i class="bi bi-truck text-emerald me-1"></i>Free Shipping</span>
                        <span><i class="bi bi-arrow-repeat text-emerald me-1"></i>Easy Returns</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== STACKED GRIDS ===== -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="stacked-grids-wrapper" id="stackedGridsWrapper">
                    <h5 class="text-center text-muted" style="font-size: clamp(0.6rem, 1vw, 0.75rem); letter-spacing:1px; text-transform:uppercase;">
                        <i class="bi bi-arrow-down" style="color:#D4AF37;"></i> SCROLL TO SPLIT · TAP <i class="bi bi-arrows-angle-expand"></i> FOR SPECS
                    </h5>

                    <div class="stacked-grids" id="stackedGrids">
                        <!-- Card 1: Front View -->
                        <div class="stack-card" data-view="front" data-pos="1"
                            data-title="Front View"
                            data-specs='[["Lens Width","52 mm"],["Bridge","18 mm"],["Frame Material","Acetate"],["Lens Tint","Optical clear"]]'>
                            <img src="assets/images/frontview.png" alt="Front">
                            <div class="card-overlay">
                                <span class="overlay-label">Lens</span>
                                <span class="overlay-value">52mm</span>
                            </div>
                            <button type="button" class="expand-btn" aria-label="View specs"><i class="bi bi-arrows-angle-expand"></i></button>
                        </div>
                        <!-- Card 2: Side View -->
                        <div class="stack-card" data-view="side" data-pos="2"
                            data-title="Side View"
                            data-specs='[["Temple Length","140 mm"],["Hinge","5-barrel spring"],["Arm Taper","2.4° flare"],["Weight","24 g"]]'>
                            <img src="assets/images/sideview.png" alt="Side">
                            <div class="card-overlay">
                                <span class="overlay-label">Temple</span>
                                <span class="overlay-value">140mm</span>
                            </div>
                            <button type="button" class="expand-btn" aria-label="View specs"><i class="bi bi-arrows-angle-expand"></i></button>
                        </div>
                        <!-- Card 3: Back View -->
                        <div class="stack-card" data-view="back" data-pos="3"
                            data-title="Back View"
                            data-specs='[["Bridge","18 mm"],["Nose Pad","Integrated keyhole"],["Panto Angle","8°"],["Finish","Matte tortoise"]]'>
                            <img src="assets/images/backview.png" alt="Back">
                            <div class="card-overlay">
                                <span class="overlay-label">Bridge</span>
                                <span class="overlay-value">18mm</span>
                            </div>
                            <button type="button" class="expand-btn" aria-label="View specs"><i class="bi bi-arrows-angle-expand"></i></button>
                        </div>
                        <!-- Card 4: Top View -->
                        <div class="stack-card" data-view="top" data-pos="4"
                            data-title="Top View"
                            data-specs='[["Frame Width","140 mm"],["Face Curvature","6-base"],["Frame Depth","38 mm"],["Screw Type","1.4 mm barrel"]]'>
                            <img src="assets/images/topview.png" alt="Top">
                            <div class="card-overlay">
                                <span class="overlay-label">Frame</span>
                                <span class="overlay-value">140mm</span>
                            </div>
                            <button type="button" class="expand-btn" aria-label="View specs"><i class="bi bi-arrows-angle-expand"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FLIP expand overlay -->
    <div class="specs-backdrop" id="specsBackdrop"></div>
</section>

<!-- ============================================================ -->
<!-- 2. REVIEWS SECTION – Emerald Green + Glassmorphism (2 cols on tablet) -->
<!-- ============================================================ -->
<section class="bg-emerald py-5" id="reviewsSection" style="padding: 60px 0 80px; position: relative; overflow: hidden;">

    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-white text-emerald px-3 py-2 rounded-pill mb-3">Customer Love</span>
            <h2 class="display-5 fw-bold text-white mb-2" style="font-family:'Poppins',sans-serif; font-size: clamp(1.6rem, 4vw, 2.5rem);">Loved by people who see clearly</h2>
            <p class="text-white-50" style="max-width:46ch; margin:0 auto; font-size: clamp(0.9rem, 1.5vw, 1.1rem);">Real reviews from people wearing Optiq every day. Tap a card to read the full story.</p>
        </div>

        <div class="review-deck-wrapper" id="reviewDeckWrapper">
            <div class="review-deck" id="reviewDeck">

                <!-- Invisible grid slots -->
                <div class="deck-grid" id="deckGrid">
                    <div class="deck-slot" data-slot="0" style="grid-area: s1;"></div>
                    <div class="deck-slot" data-slot="1" style="grid-area: s2;"></div>
                    <div class="deck-slot" data-slot="2" style="grid-area: s3;"></div>
                    <div class="deck-slot" data-slot="3" style="grid-area: s4;"></div>
                    <div class="deck-slot" data-slot="4" style="grid-area: s5;"></div>
                </div>

                <!-- Review Cards – Glassmorphism -->
                <div class="review-card" data-index="0" data-depth="1"
                    data-name="Ananya R." data-loc="Chennai" data-product="Aria Sunglasses" data-rating="5"
                    data-avatar="https://i.pravatar.cc/150?img=32"
                    data-review="From the first day, the fit felt custom-made. The acetate frame is noticeably lighter than my old pair, and the anti-glare coating actually makes a difference during my evening drives. Worth every rupee.">
                    <div class="card-parallax">
                        <div class="card-face glass-card">
                            <div class="quote-mark">"</div>
                            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="review-text">From the first day, the fit felt custom-made. The acetate frame is noticeably lighter than my old pair.</p>
                            <div class="reviewer">
                                <img src="https://i.pravatar.cc/150?img=32" alt="Ananya R.">
                                <div>
                                    <div class="reviewer-name">Ananya R.</div>
                                    <div class="reviewer-meta">Chennai · Aria Sunglasses</div>
                                </div>
                            </div>
                            <div class="view-hint"><i class="bi bi-arrows-angle-expand"></i></div>
                        </div>
                    </div>
                </div>

                <div class="review-card" data-index="1" data-depth="0.6"
                    data-name="Karthik S." data-loc="Bengaluru" data-product="Vantage Titanium" data-rating="5"
                    data-avatar="https://i.pravatar.cc/150?img=12"
                    data-review="I have a strong prescription and most frames make the lenses look thick. Optiq's high-index option combined with the Vantage frame keeps everything slim and light. Compliments every week.">
                    <div class="card-parallax">
                        <div class="card-face glass-card">
                            <div class="quote-mark">"</div>
                            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="review-text">Most frames make thick lenses look bulky. The Vantage keeps everything slim and light.</p>
                            <div class="reviewer">
                                <img src="https://i.pravatar.cc/150?img=12" alt="Karthik S.">
                                <div>
                                    <div class="reviewer-name">Karthik S.</div>
                                    <div class="reviewer-meta">Bengaluru · Vantage Titanium</div>
                                </div>
                            </div>
                            <div class="view-hint"><i class="bi bi-arrows-angle-expand"></i></div>
                        </div>
                    </div>
                </div>

                <div class="review-card" data-index="2" data-depth="0.8"
                    data-name="Meera J." data-loc="Mumbai" data-product="Aria Sunglasses" data-rating="4"
                    data-avatar="https://i.pravatar.cc/150?img=45"
                    data-review="The packaging alone felt premium — magnetic case, microfiber pouch, the works. Lens clarity is excellent in bright sun. Only wish there were two more colourways to choose from.">
                    <div class="card-parallax">
                        <div class="card-face glass-card">
                            <div class="quote-mark">"</div>
                            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i></div>
                            <p class="review-text">Packaging alone felt premium. Lens clarity is excellent even in bright sun.</p>
                            <div class="reviewer">
                                <img src="https://i.pravatar.cc/150?img=45" alt="Meera J.">
                                <div>
                                    <div class="reviewer-name">Meera J.</div>
                                    <div class="reviewer-meta">Mumbai · Aria Sunglasses</div>
                                </div>
                            </div>
                            <div class="view-hint"><i class="bi bi-arrows-angle-expand"></i></div>
                        </div>
                    </div>
                </div>

                <div class="review-card" data-index="3" data-depth="0.5"
                    data-name="Rohan D." data-loc="Pune" data-product="Cove Blue-Light" data-rating="5"
                    data-avatar="https://i.pravatar.cc/150?img=51"
                    data-review="Bought the Cove for long work-from-home screen sessions. My eye strain by evening has genuinely dropped. The frame also doesn't pinch after 8+ hours, which surprised me.">
                    <div class="card-parallax">
                        <div class="card-face glass-card">
                            <div class="quote-mark">"</div>
                            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="review-text">My eye strain by evening has genuinely dropped since switching to the Cove.</p>
                            <div class="reviewer">
                                <img src="https://i.pravatar.cc/150?img=51" alt="Rohan D.">
                                <div>
                                    <div class="reviewer-name">Rohan D.</div>
                                    <div class="reviewer-meta">Pune · Cove Blue-Light</div>
                                </div>
                            </div>
                            <div class="view-hint"><i class="bi bi-arrows-angle-expand"></i></div>
                        </div>
                    </div>
                </div>

                <div class="review-card" data-index="4" data-depth="0.7"
                    data-name="Priya N." data-loc="Hyderabad" data-product="Vantage Titanium" data-rating="5"
                    data-avatar="https://i.pravatar.cc/150?img=47"
                    data-review="Ordered without trying in-store and was nervous, but the virtual fit guide was spot on. Titanium build feels indestructible. This is my third pair from Optiq and it won't be the last.">
                    <div class="card-parallax">
                        <div class="card-face glass-card">
                            <div class="quote-mark">"</div>
                            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="review-text">Titanium build feels indestructible. This is my third pair from Optiq.</p>
                            <div class="reviewer">
                                <img src="https://i.pravatar.cc/150?img=47" alt="Priya N.">
                                <div>
                                    <div class="reviewer-name">Priya N.</div>
                                    <div class="reviewer-meta">Hyderabad · Vantage Titanium</div>
                                </div>
                            </div>
                            <div class="view-hint"><i class="bi bi-arrows-angle-expand"></i></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FLIP expand overlay -->
    <div class="review-backdrop" id="reviewBackdrop"></div>
</section>

<!-- ============================================================ -->
<!-- 3. RELATED PRODUCTS – You May Also Like (9 items)            -->
<!-- ============================================================ -->
<?php
$related_ids = isset($product['related']) ? $product['related'] : [];
// Add one extra product if available
if (isset($products['crystal-vision']) && !in_array('crystal-vision', $related_ids)) {
    $related_ids[] = 'crystal-vision';
}
?>

<?php if (!empty($related_ids)): ?>
    <section class="bg-white py-5">
        <div class="container">
            <h2 class="text-center text-navy mb-5" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.6rem, 3vw, 2.2rem);">You May Also Like</h2>
            <div class="row g-4">
                <?php
                $related_count = 0;
                foreach ($related_ids as $rid):
                    if (!isset($products[$rid])) continue;
                    if ($related_count >= 9) break;
                    $rel = $products[$rid];
                    $related_count++;
                ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card living-card" data-id="<?= $rid; ?>" style="cursor: pointer;">
                            <div class="card-media">
                                <img src="<?= $rel['hero_image'] ?>" alt="<?= $rel['name'] ?>" class="card-img">
                                <div class="shutter shutter-top"></div>
                                <div class="shutter shutter-bottom"></div>
                            </div>
                            <div class="card-details">
                                <div class="card-details-inner">
                                    <h6 class="fw-bold text-navy mb-1" style="font-size: clamp(0.7rem, 1.2vw, 0.9rem);"><?= $rel['name'] ?></h6>
                                    <p class="text-muted small mb-2" style="font-size: clamp(0.6rem, 0.9vw, 0.75rem);"><?= $rel['material'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-emerald" style="font-size: clamp(0.7rem, 1.2vw, 0.9rem);">₹<?= number_format($rel['price']) ?></span>
                                        <span class="text-gold small" style="font-size: clamp(0.5rem, 0.8vw, 0.65rem);">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-actions">
                                <div class="card-actions-inner">
                                    <button class="action-icon wishlist-btn" title="Wishlist"
                                        data-id="<?= $rid; ?>"
                                        data-name="<?= $rel['name'] ?>"
                                        data-img="<?= $rel['hero_image'] ?>"
                                        data-price="<?= $rel['price'] ?>"
                                        data-color="default"
                                        data-size="medium"
                                        style="width: clamp(30px, 5vw, 38px); height: clamp(30px, 5vw, 38px); font-size: clamp(0.7rem, 1.2vw, 0.9rem);">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="action-icon add-to-bag-btn"
                                        data-id="<?= $rid; ?>"
                                        data-name="<?= $rel['name'] ?>"
                                        data-img="<?= $rel['hero_image'] ?>"
                                        data-price="<?= $rel['price'] ?>"
                                        data-color="default"
                                        data-size="medium"
                                        title="Add to Cart"
                                        style="width: clamp(30px, 5vw, 38px); height: clamp(30px, 5vw, 38px); font-size: clamp(0.7rem, 1.2vw, 0.9rem);">
                                        <i class="bi bi-bag"></i>
                                    </button>
                                    <a href="product.php?id=<?= $rid; ?>" class="action-icon quick-view-btn" title="View Product" style="text-decoration: none; display: inline-flex; width: clamp(30px, 5vw, 38px); height: clamp(30px, 5vw, 38px); font-size: clamp(0.7rem, 1.2vw, 0.9rem);">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ========================== search-overlay.php   ================================== -->
<?php include 'search-overlay.php'; ?>
<!-- ============================================================ -->
<!-- FOOTER                                                       -->
<!-- ============================================================ -->
<?php include 'templates/footer.php'; ?>

<!-- ============================================================ -->
<!-- STYLES – Complete with Responsive Fixes                      -->
<!-- ============================================================ -->
<style>
    /* ============================================================
   COLOR PALETTE
   ============================================================ */
    .bg-cream {
        background: #F7F5F0 !important;
    }

    .bg-white {
        background: #ffffff !important;
    }

    .bg-navy {
        background: #0A192F !important;
    }

    .bg-emerald {
        background: #0F3D2E !important;
    }

    .text-navy {
        color: #0A192F !important;
    }

    .text-emerald {
        color: #0F3D2E !important;
    }

    .text-gold {
        color: #D4AF37 !important;
    }

    /* Buttons - Emerald Green */
    .btn-emerald {
        background: #0F3D2E !important;
        border-color: #0F3D2E !important;
        color: #fff !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }

    .btn-emerald:hover {
        background: #1a4f3a !important;
        border-color: #1a4f3a !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 61, 46, 0.25);
    }

    .btn-outline-emerald {
        border: 2px solid #0F3D2E !important;
        color: #0F3D2E !important;
        background: transparent !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }

    .btn-outline-emerald:hover {
        background: #0F3D2E !important;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 61, 46, 0.15);
    }

    .badge.bg-emerald {
        background: #0F3D2E !important;
        color: #fff !important;
    }

    /* Size buttons */
    .size-btn {
        font-size: clamp(0.6rem, 1vw, 0.75rem);
        padding: clamp(2px, 0.4vw, 4px) clamp(8px, 1.5vw, 16px);
        border-radius: 50px;
    }

    /* Quantity Selector */
    .quantity-selector .qty-btn:hover {
        background: #0F3D2E !important;
        color: #fff !important;
    }

    .quantity-selector .qty-btn i {
        font-size: clamp(0.8rem, 1.2vw, 1rem);
        pointer-events: none;
    }

    /* ============================================================
   HERO – Light Streak
   ============================================================ */
    .light-streak {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.08) 50%, transparent 60%);
        transform: rotate(30deg);
        animation: streak 6s infinite;
        pointer-events: none;
        z-index: 5;
    }

    @keyframes streak {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(30deg);
        }

        100% {
            transform: translateX(100%) translateY(100%) rotate(30deg);
        }
    }

    /* ============================================================
   STACKED GRIDS – Responsive (2 columns on mobile, no cut-off)
   ============================================================ */
    .stacked-grids-wrapper {
        margin-top: 2rem;
        position: relative;
    }

    .stacked-grids {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.2rem;
        max-width: 100%;
        margin: 1.5rem auto 0;
        position: relative;
    }

    @media (max-width: 991.98px) {
        .stacked-grids {
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }
    }

    @media (max-width: 575.98px) {
        .stacked-grids {
            gap: 0.6rem;
        }
        .stack-card {
            border-radius: 10px !important;
        }
    }

    .stack-card {
        position: relative;
        aspect-ratio: 1 / 1;
        border-radius: 14px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        cursor: pointer;
        will-change: transform, opacity, filter;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
    }

    .stack-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
        pointer-events: none;
    }

    .stack-card:hover img {
        transform: scale(1.04);
    }

    .card-overlay {
        position: absolute;
        inset: 0;
        border-radius: 14px;
        background: rgba(10, 25, 47, 0.7);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(212, 175, 55, 0.1);
        opacity: 0;
        transition: all 0.5s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0.5rem;
        pointer-events: none;
    }

    .stack-card:hover .card-overlay {
        opacity: 1;
        border-color: rgba(212, 175, 55, 0.3);
    }

    .card-overlay .overlay-label {
        font-size: clamp(0.35rem, 0.8vw, 0.45rem);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.3);
        font-weight: 500;
    }

    .card-overlay .overlay-value {
        font-size: clamp(0.8rem, 2vw, 1.1rem);
        font-weight: 700;
        color: #D4AF37;
        line-height: 1.2;
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.1);
    }

    .expand-btn {
        position: absolute;
        top: clamp(4px, 0.8vw, 8px);
        right: clamp(4px, 0.8vw, 8px);
        width: clamp(20px, 4vw, 26px);
        height: clamp(20px, 4vw, 26px);
        border-radius: 50%;
        background: rgba(10, 25, 47, 0.75);
        border: 1px solid rgba(212, 175, 55, 0.4);
        color: #D4AF37;
        font-size: clamp(0.5rem, 1vw, 0.7rem);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: scale(0.8);
        transition: opacity 0.25s ease, transform 0.25s ease, background 0.25s ease;
        z-index: 6;
    }

    .stack-card:hover .expand-btn {
        opacity: 1;
        transform: scale(1);
    }

    .expand-btn:hover {
        background: #D4AF37;
        color: #0A192F;
    }

    /* Specs Modal - fully visible on all devices */
    .specs-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(5, 12, 24, 0.75);
        backdrop-filter: blur(6px);
        z-index: 1080;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .specs-backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    .specs-card {
        position: fixed;
        z-index: 1090;
        background: #F7F5F0 !important;
        border: 1px solid rgba(15, 61, 46, 0.2) !important;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        box-shadow: 0 40px 90px rgba(0, 0, 0, 0.55);
        max-height: 90vh;
        max-width: 92vw;
        overflow-y: auto;
    }

    .specs-visual {
        flex: 1 1 42%;
        position: relative;
    }

    .specs-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .specs-info {
        flex: 1 1 58%;
        padding: clamp(16px, 3vw, 32px);
        color: #0A192F !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .specs-info .eyebrow {
        font-size: clamp(0.5rem, 0.8vw, 0.7rem);
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #0F3D2E !important;
        margin-bottom: 8px;
    }

    .specs-info h3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: clamp(1rem, 2vw, 1.5rem);
        margin-bottom: 16px;
        color: #0A192F !important;
    }

    .specs-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: clamp(6px, 1vw, 10px) 0;
        border-bottom: 1px solid rgba(10, 25, 47, 0.08);
        font-size: clamp(0.7rem, 1vw, 0.85rem);
        color: rgba(10, 25, 47, 0.6);
    }

    .specs-row b {
        color: #0A192F !important;
        font-weight: 600;
    }

    .specs-close {
        position: absolute;
        top: clamp(8px, 1.5vw, 14px);
        right: clamp(8px, 1.5vw, 16px);
        width: clamp(26px, 4vw, 30px);
        height: clamp(26px, 4vw, 30px);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(15, 61, 46, 0.3);
        color: #0F3D2E;
        font-size: clamp(0.8rem, 1.2vw, 1rem);
        line-height: 1;
        cursor: pointer;
        z-index: 10;
    }

    .specs-close:hover {
        background: #0F3D2E;
        color: #fff;
    }

    @media (max-width: 575.98px) {
        .specs-card {
            flex-direction: column;
            width: 92vw !important;
            max-height: 85vh;
            overflow-y: auto;
        }
        .specs-visual {
            height: 160px;
        }
        .specs-info {
            padding: 16px 20px;
        }
    }

    /* ============================================================
   REVIEWS – GLASSMORPHISM ON EMERALD (2 cols on tablet)
   SHRUNK VERSION
   ============================================================ */
    .review-deck-wrapper {
        position: relative;
    }

    .review-deck {
        position: relative;
        width: 100%;
        max-width: 360px; 
        
  
        margin: 0 auto;
    }

    .deck-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-areas: "s1 s2" "s3 s4" "s5 s5";
        gap: 16px; /* REDUCED from 28px */
        width: 100%;
    }

    .deck-slot {
        aspect-ratio: 4/5;
        visibility: hidden;
    }

    .deck-grid [style*="s5"] {
        max-width: calc(50% - 8px);
        margin: 0 auto;
    }

    @media (max-width: 991.98px) {
        .deck-grid {
            grid-template-columns: 1fr 1fr;
            grid-template-areas: "s1 s2" "s3 s4" "s5 s5";
            gap: 14px;
        }
        .deck-grid [style*="s5"] {
            max-width: calc(50% - 7px);
        }
    }

    @media (max-width: 575.98px) {
        .deck-grid {
            grid-template-columns: 1fr;
            grid-template-areas: "s1" "s2" "s3" "s4" "s5";
            gap: 12px;
        }
        .deck-grid [style*="s5"] {
            max-width: 100%;
        }
        
    }

    .review-card {
        position: absolute;
        top: 0;
        left: 0;
        will-change: transform, width, height, opacity;
    }

    .card-parallax {
        width: 100%;
        height: 100%;
        will-change: transform;
    }

    .card-face.glass-card {
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.08) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border: 1px solid rgba(255, 255, 255, 0.12) !important;
        border-radius: 18px;
        padding: 14px 12px; /* REDUCED from 20px 18px */
        display: flex;
        flex-direction: column;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        cursor: pointer;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease, border-color 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .card-face.glass-card:hover {
        transform: translateY(-8px) rotate(-1.6deg) scale(1.015);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35), 0 0 40px rgba(212, 175, 55, 0.1);
        border-color: rgba(212, 175, 55, 0.3) !important;
    }

    .quote-mark {
        font-family: 'Poppins', sans-serif;
        font-size: clamp(24px, 4vw, 36px); /* REDUCED */
        line-height: 1;
        color: rgba(212, 175, 55, 0.3);
        margin-bottom: -4px;
    }

    .stars {
        color: #D4AF37;
        font-size: clamp(8px, 1vw, 11px); /* REDUCED */
        letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .stars .bi-star {
        color: rgba(255, 255, 255, 0.2);
    }

    .review-text {
        color: rgba(255, 255, 255, 0.85);
        font-size: clamp(10px, 1.2vw, 13px); /* REDUCED */
        line-height: 1.6;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .reviewer {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        padding-top: 8px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .reviewer img {
        width: clamp(24px, 3vw, 32px); /* REDUCED */
        height: clamp(24px, 3vw, 32px);
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .reviewer-name {
        color: #fff;
        font-size: clamp(10px, 1vw, 12px); /* REDUCED */
        font-weight: 600;
    }

    .reviewer-meta {
        color: rgba(255, 255, 255, 0.5);
        font-size: clamp(8px, 0.8vw, 10px); /* REDUCED */
    }

    .view-hint {
        position: absolute;
        top: 10px;
        right: 10px;
        width: clamp(18px, 2vw, 22px);
        height: clamp(18px, 2vw, 22px);
        border-radius: 50%;
        background: rgba(10, 25, 47, 0.4);
        border: 1px solid rgba(212, 175, 55, 0.3);
        color: #D4AF37;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(0.45rem, 0.7vw, 0.6rem);
        opacity: 0;
        transform: scale(0.8);
        transition: opacity 0.25s ease, transform 0.25s ease;
    }

    .card-face.glass-card:hover .view-hint {
        opacity: 1;
        transform: scale(1);
    }

    /* Review Expand Modal - fully visible */
    .review-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(5, 12, 24, 0.78);
        backdrop-filter: blur(8px);
        z-index: 1080;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .review-backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    .review-expand {
        position: fixed;
        z-index: 1090;
        overflow: hidden;
        display: flex;
        background: #F7F5F0 !important;
        border: 1px solid rgba(15, 61, 46, 0.2) !important;
        border-radius: 20px;
        box-shadow: 0 50px 100px rgba(0, 0, 0, 0.55);
        max-height: 90vh;
        max-width: 92vw;
        overflow-y: auto;
    }

    .expand-visual {
        flex: 0 0 180px;
        position: relative;
    }

    .expand-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .expand-visual::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent 60%, rgba(247, 245, 240, 0.9));
    }

    .expand-body {
        flex: 1;
        padding: clamp(20px, 4vw, 38px);
        color: #0A192F !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .expand-body .stars {
        color: #D4AF37 !important;
        font-size: clamp(12px, 1.5vw, 15px);
        margin-bottom: 12px;
    }

    .expand-body .review-text {
        -webkit-line-clamp: unset;
        font-size: clamp(14px, 1.6vw, 16px);
        line-height: 1.75;
        color: rgba(10, 25, 47, 0.85) !important;
        margin-bottom: 18px;
    }

    .expand-body .reviewer {
        border-top: 1px solid rgba(10, 25, 47, 0.1);
    }

    .expand-body .reviewer-name {
        color: #0A192F !important;
    }

    .expand-body .reviewer-meta {
        color: rgba(10, 25, 47, 0.5) !important;
    }

    .expand-close {
        position: absolute;
        top: 12px;
        right: 14px;
        width: clamp(28px, 4vw, 32px);
        height: clamp(28px, 4vw, 32px);
        border-radius: 50%;
        background: rgba(15, 61, 46, 0.06);
        border: 1px solid rgba(15, 61, 46, 0.3);
        color: #0F3D2E;
        font-size: clamp(0.9rem, 1.2vw, 1.05rem);
        line-height: 1;
        cursor: pointer;
        z-index: 2;
    }

    .expand-close:hover {
        background: #0F3D2E;
        color: #fff;
    }

    @media (max-width: 640px) {
        .review-expand {
            flex-direction: column;
            width: 92vw !important;
            max-height: 85vh;
            overflow-y: auto;
        }
        .expand-visual {
            flex: 0 0 140px;
        }
        .expand-body {
            padding: 20px;
        }
    }

    /* ============================================================
   RELATED PRODUCTS – LIVING CARD (Emerald Shutter)
   ============================================================ */
    .living-card {
        position: relative;
        background: #fff;
        border: 1px solid rgba(10, 25, 47, 0.08);
        border-radius: 1rem;
        overflow: hidden;
        transition: box-shadow 0.4s ease, border-color 0.4s ease;
        text-decoration: none;
    }

    .living-card.is-hovering {
        box-shadow: 0 22px 46px rgba(10, 25, 47, 0.14), 0 0 0 1px rgba(15, 61, 46, 0.2);
        border-color: rgba(15, 61, 46, 0.2);
    }

    .card-media {
        position: relative;
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
        background: #f6f5f2;
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        will-change: transform;
    }

    .shutter {
        position: absolute;
        left: 0;
        right: 0;
        height: 50%;
        background: #0F3D2E !important;
        transform: scaleY(0);
        z-index: 3;
        will-change: transform;
    }

    .shutter-top {
        top: 0;
        transform-origin: top;
    }

    .shutter-bottom {
        bottom: 0;
        transform-origin: bottom;
    }

    .shutter-top::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: rgba(212, 175, 55, 0.3);
    }

    .card-details {
        height: 0;
        overflow: hidden;
    }

    .card-details-inner {
        padding: 12px 12px 4px;
    }

    .card-actions {
        height: 0;
        overflow: hidden;
    }

    .card-actions-inner {
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 4px 12px 12px;
    }

    .action-icon {
        border-radius: 50%;
        border: 1px solid rgba(15, 61, 46, 0.2);
        background: transparent;
        color: #0A192F;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateY(10px);
        transition: background 0.25s ease, color 0.25s ease, transform 0.25s ease;
        cursor: pointer;
        position: relative;
        z-index: 5;
        text-decoration: none !important;
    }

    .action-icon:hover {
        background: #0F3D2E;
        color: #fff;
        border-color: #0F3D2E;
        transform: translateY(0) scale(1.08);
    }

    .action-icon i {
        pointer-events: none;
    }

    .wishlist-btn.active i {
        color: #D4AF37;
    }

    @media (hover: none),
    (pointer: coarse) {
        .card-details,
        .card-actions {
            height: auto !important;
        }
        .card-actions-inner .action-icon {
            opacity: 1;
            transform: none;
        }
        .shutter {
            display: none;
        }
    }

    /* ============================================================
   RESPONSIVE TWEAKS – Additional
   ============================================================ */
    @media (max-width: 575.98px) {
        .hero-section {
            padding-top: 80px !important;
        }
        .hero-img-wrapper {
            max-width: 100% !important;
        }
        .color-swatch {
            width: 22px !important;
            height: 22px !important;
        }
        .quantity-selector {
            width: auto !important; /* FIX: not full width */
        }
        .quantity-selector .qty-btn {
            padding: 4px 12px !important;
        }
        /* 🔹 MOBILE BUTTONS: Reduced width & side-by-side */
        .btn-emerald,
        .btn-outline-emerald {
            width: auto !important;
            flex: 1 1 45% !important;
            min-width: 100px !important;
            justify-content: center !important;
        }
        .d-flex.flex-wrap.gap-3 {
            gap: 0.8rem !important;
        }
        .review-card .card-face.glass-card {
            padding: 12px 10px !important;
        }
        .review-text {
            font-size: 10px !important;
        }
        .reviewer {
            gap: 4px !important;
            margin-top: 6px !important;
            padding-top: 4px !important;
        }
        .reviewer img {
            width: 24px !important;
            height: 24px !important;
        }
        .reviewer-name {
            font-size: 9px !important;
        }
        .reviewer-meta {
            font-size: 7px !important;
        }
        .quote-mark {
            font-size: 22px !important;
        }
        .stars {
            font-size: 8px !important;
        }
        .quantity-selector {
    width: auto !important;
}
.btn-emerald,
.btn-outline-emerald {
    width: auto !important;
    flex: 1 1 45% !important;
    min-width: 100px !important;
    justify-content: center !important;
}
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPTS – GSAP + All Animations                              -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        // ============================================================
        // QUANTITY SELECTOR
        // ============================================================
        let qty = 1;
        const qtyDisplay = document.getElementById('qtyDisplay');
        const qtyMinus = document.getElementById('qtyMinus');
        const qtyPlus = document.getElementById('qtyPlus');

        if (qtyMinus && qtyPlus && qtyDisplay) {
            qtyMinus.addEventListener('click', function() {
                if (qty > 1) {
                    qty--;
                    qtyDisplay.textContent = qty;
                }
            });
            qtyPlus.addEventListener('click', function() {
                if (qty < 10) {
                    qty++;
                    qtyDisplay.textContent = qty;
                }
            });
        }

        // ============================================================
        // 1. STACKED GRIDS – Cluster → Spread
        // ============================================================
        const wrapper = document.getElementById('stackedGridsWrapper');
        const grid = document.getElementById('stackedGrids');
        const cards = gsap.utils.toArray('.stack-card', grid);

        const clusterOffsets = [{
                x: 6,
                y: -6,
                rot: -3,
                scale: 0.94
            },
            {
                x: -6,
                y: -6,
                rot: 3,
                scale: 0.96
            },
            {
                x: 6,
                y: 6,
                rot: 3,
                scale: 0.96
            },
            {
                x: -6,
                y: 6,
                rot: -3,
                scale: 0.94
            },
        ];

        cards.forEach((card, i) => {
            const c = clusterOffsets[i] || clusterOffsets[0];
            gsap.set(card, {
                x: c.x,
                y: c.y,
                rotation: c.rot,
                scale: c.scale,
                opacity: 0.85,
                filter: "blur(2px)",
                zIndex: 4 - i
            });
        });

        gsap.timeline({
            scrollTrigger: {
                trigger: wrapper,
                start: "top 85%",
                end: "top 40%",
                scrub: 0.6,
                toggleActions: "play none none none"
            }
        }).to(cards, {
            x: 0,
            y: 0,
            rotation: 0,
            scale: 1,
            opacity: 1,
            filter: "blur(0px)",
            duration: 1,
            ease: "power3.out",
            stagger: 0.08
        });

        // ---- Click card → swap hero image ----
        const heroImg = document.getElementById('heroProductImg');
        const imageMap = {
            'front': 'https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=600&h=600&fit=crop&crop=center',
            'side': 'https://images.unsplash.com/photo-1591122947157-ef2e4b1df0a4?w=600&h=600&fit=crop&crop=center',
            'back': 'https://images.unsplash.com/photo-1591122947157-ef2e4b1df0a4?w=600&h=600&fit=crop&crop=center',
            'top': 'https://images.unsplash.com/photo-1591122947157-ef2e4b1df0a4?w=600&h=600&fit=crop&crop=center'
        };

        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.closest('.expand-btn')) return;
                const view = this.dataset.view;
                if (heroImg) {
                    heroImg.style.transition = 'opacity 0.3s ease';
                    heroImg.style.opacity = '0';
                    setTimeout(() => {
                        heroImg.src = imageMap[view] || imageMap['front'];
                        heroImg.style.opacity = '1';
                    }, 300);
                }
            });
        });

        // ---- EXPAND ICON → FLIP TO SPEC SHEET (with viewport fitting) ----
        const backdrop = document.getElementById('specsBackdrop');
        let openEl = null;

        function openSpecs(card) {
            if (openEl) return;
            const first = card.getBoundingClientRect();
            const title = card.dataset.title || 'Details';
            const rows = JSON.parse(card.dataset.specs || '[]');
            const imgSrc = card.querySelector('img').src;

            const el = document.createElement('div');
            el.className = 'specs-card';
            el.style.left = first.left + 'px';
            el.style.top = first.top + 'px';
            el.style.width = first.width + 'px';
            el.style.height = first.height + 'px';
            el.innerHTML = `
            <button type="button" class="specs-close" aria-label="Close">×</button>
            <div class="specs-visual"><img src="${imgSrc}" alt="${title}"></div>
            <div class="specs-info">
                <div class="eyebrow">Spec sheet</div>
                <h3>${title}</h3>
                ${rows.map(([k, v]) => `<div class="specs-row"><span>${k}</span><b>${v}</b></div>`).join('')}
            </div>`;
            document.body.appendChild(el);
            openEl = el;
            card.style.visibility = 'hidden';
            backdrop.classList.add('active');

            // Calculate target size to fit viewport
            const maxW = Math.min(window.innerWidth * 0.92, 720);
            const maxH = Math.min(window.innerHeight * 0.85, 500);
            const targetW = Math.min(maxW, 720);
            const targetH = Math.min(maxH, 500);
            const targetX = (window.innerWidth - targetW) / 2;
            const targetY = (window.innerHeight - targetH) / 2;

            gsap.fromTo(el, {
                left: first.left,
                top: first.top,
                width: first.width,
                height: first.height,
                borderRadius: 14
            }, {
                left: targetX,
                top: targetY,
                width: targetW,
                height: targetH,
                borderRadius: 16,
                duration: 0.5,
                ease: "power3.inOut"
            });
            gsap.fromTo(el.querySelectorAll('.specs-info > *'), {
                opacity: 0,
                y: 10
            }, {
                opacity: 1,
                y: 0,
                duration: 0.4,
                stagger: 0.05,
                delay: 0.25
            });

            const close = () => closeSpecs(card, first);
            el.querySelector('.specs-close').addEventListener('click', close);
            backdrop.addEventListener('click', close, {
                once: true
            });
        }

        function closeSpecs(card, first) {
            if (!openEl) return;
            const el = openEl;
            gsap.to(el.querySelectorAll('.specs-info > *'), {
                opacity: 0,
                duration: 0.12
            });
            gsap.to(el, {
                left: first.left,
                top: first.top,
                width: first.width,
                height: first.height,
                borderRadius: 14,
                duration: 0.4,
                ease: "power3.inOut",
                onComplete: () => {
                    el.remove();
                    openEl = null;
                    card.style.visibility = 'visible';
                }
            });
            backdrop.classList.remove('active');
        }

        document.querySelectorAll('.expand-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                openSpecs(this.closest('.stack-card'));
            });
        });

        // ============================================================
        // 2. REVIEW DECK – Stack → Fan → Grid (2 cols on tablet)
        // ============================================================
        const deck = document.getElementById('reviewDeck');
        const deckGrid = document.getElementById('deckGrid');
        const deckWrapper = document.getElementById('reviewDeckWrapper');
        const reviewCards = gsap.utils.toArray('.review-card', deck);
        const slots = gsap.utils.toArray('.deck-slot', deckGrid);

        let hasPlayed = false;

        function getRects() {
            const deckBox = deck.getBoundingClientRect();
            return slots.map(s => {
                const b = s.getBoundingClientRect();
                return {
                    x: b.left - deckBox.left,
                    y: b.top - deckBox.top,
                    w: b.width,
                    h: b.height
                };
            });
        }

        function setDeckHeight() {
            deck.style.height = deckGrid.getBoundingClientRect().height + 'px';
        }

        function layoutCluster() {
            const rects = getRects();
            const deckBox = deck.getBoundingClientRect();
            const cx = deckBox.width / 2,
                cy = deckBox.height / 2;
            const heroW = Math.min(rects[0].w * 1.25, deckBox.width * 0.62);
            const heroH = Math.min(rects[0].h * 1.2, deckBox.height * 0.55);

            reviewCards.forEach((card, i) => {
                if (i === 0) {
                    gsap.set(card, {
                        x: cx - heroW / 2,
                        y: cy - heroH / 2 - 20,
                        width: heroW,
                        height: heroH,
                        rotation: 0,
                        opacity: 1,
                        filter: 'blur(0px)',
                        zIndex: 10
                    });
                } else {
                    const fan = (i - 2.5) * 3.5;
                    gsap.set(card, {
                        x: cx - heroW / 2 + (i % 2 === 0 ? -8 : 8),
                        y: cy - heroH / 2 - 20 + 6 * i,
                        width: heroW,
                        height: heroH,
                        rotation: fan,
                        opacity: 0,
                        filter: 'blur(4px)',
                        zIndex: 10 - i,
                        scale: 0.94
                    });
                }
            });
        }

        function playSpread() {
            if (hasPlayed) return;
            hasPlayed = true;
            const rects = getRects();

            const tl = gsap.timeline();
            reviewCards.forEach((card, i) => {
                const r = rects[i];
                tl.to(card, {
                    x: r.x,
                    y: r.y,
                    width: r.w,
                    height: r.h,
                    rotation: 0,
                    opacity: 1,
                    scale: 1,
                    filter: 'blur(0px)',
                    duration: 1.05,
                    ease: 'back.out(1.5)'
                }, i * 0.09);
            });
        }

        function buildAll() {
            setDeckHeight();
            if (!hasPlayed) layoutCluster();
            else {
                const rects = getRects();
                reviewCards.forEach((card, i) => gsap.set(card, {
                    x: rects[i].x,
                    y: rects[i].y,
                    width: rects[i].w,
                    height: rects[i].h
                }));
            }
        }

        buildAll();
        window.addEventListener('resize', buildAll);

        ScrollTrigger.create({
            trigger: deckWrapper,
            start: 'top 78%',
            onEnter: playSpread
        });
        deckWrapper.addEventListener('mouseenter', playSpread);

        // ---- Mouse Parallax on Reviews ----
        const parallaxLayers = gsap.utils.toArray('.card-parallax');
        const quickSetters = parallaxLayers.map(layer => ({
            x: gsap.quickTo(layer, 'x', {
                duration: 0.6,
                ease: 'power3.out'
            }),
            y: gsap.quickTo(layer, 'y', {
                duration: 0.6,
                ease: 'power3.out'
            })
        }));

        deckWrapper.addEventListener('mousemove', (e) => {
            if (!hasPlayed) return;
            const box = deckWrapper.getBoundingClientRect();
            const relX = (e.clientX - box.left) / box.width - 0.5;
            const relY = (e.clientY - box.top) / box.height - 0.5;

            reviewCards.forEach((card, i) => {
                const depth = parseFloat(card.dataset.depth) || 0.5;
                quickSetters[i].x(relX * 18 * depth);
                quickSetters[i].y(relY * 14 * depth);
            });
        });
        deckWrapper.addEventListener('mouseleave', () => {
            parallaxLayers.forEach(layer => gsap.to(layer, {
                x: 0,
                y: 0,
                duration: 0.5,
                ease: 'power3.out'
            }));
        });

        // ---- Review Flip Expand (full viewport) ----
        const reviewBackdrop = document.getElementById('reviewBackdrop');
        let reviewOpenEl = null;

        function starMarkup(rating) {
            let s = '';
            for (let i = 1; i <= 5; i++) s += `<i class="bi ${i <= rating ? 'bi-star-fill' : 'bi-star'}"></i>`;
            return s;
        }

        function openReview(card) {
            if (reviewOpenEl) return;
            const face = card.querySelector('.card-face');
            const first = face.getBoundingClientRect();
            const d = card.dataset;

            const el = document.createElement('div');
            el.className = 'review-expand';
            el.style.left = first.left + 'px';
            el.style.top = first.top + 'px';
            el.style.width = first.width + 'px';
            el.style.height = first.height + 'px';
            el.innerHTML = `
            <button type="button" class="expand-close" aria-label="Close">×</button>
            <div class="expand-visual"><img src="${d.avatar}" alt="${d.name}"></div>
            <div class="expand-body">
                <div class="stars">${starMarkup(d.rating)}</div>
                <p class="review-text">${d.review}</p>
                <div class="reviewer">
                    <img src="${d.avatar}" alt="${d.name}">
                    <div>
                        <div class="reviewer-name">${d.name}</div>
                        <div class="reviewer-meta">${d.loc} · ${d.product}</div>
                    </div>
                </div>
            </div>`;
            document.body.appendChild(el);
            reviewOpenEl = el;
            card.style.visibility = 'hidden';
            reviewBackdrop.classList.add('active');

            const maxW = Math.min(window.innerWidth * 0.92, 720);
            const maxH = Math.min(window.innerHeight * 0.85, 450);
            const targetW = Math.min(maxW, 720);
            const targetH = Math.min(maxH, 450);
            const targetX = (window.innerWidth - targetW) / 2;
            const targetY = (window.innerHeight - targetH) / 2;

            gsap.fromTo(el, {
                left: first.left,
                top: first.top,
                width: first.width,
                height: first.height,
                borderRadius: 18
            }, {
                left: targetX,
                top: targetY,
                width: targetW,
                height: targetH,
                borderRadius: 20,
                duration: 0.55,
                ease: 'power3.inOut'
            });
            gsap.fromTo(el.querySelectorAll('.expand-body > *'), {
                opacity: 0,
                y: 12
            }, {
                opacity: 1,
                y: 0,
                duration: 0.4,
                stagger: 0.06,
                delay: 0.28
            });

            const close = () => closeReview(card, first);
            el.querySelector('.expand-close').addEventListener('click', close);
            reviewBackdrop.addEventListener('click', close, {
                once: true
            });
        }

        function closeReview(card, first) {
            if (!reviewOpenEl) return;
            const el = reviewOpenEl;
            gsap.to(el.querySelectorAll('.expand-body > *'), {
                opacity: 0,
                duration: 0.12
            });
            gsap.to(el, {
                left: first.left,
                top: first.top,
                width: first.width,
                height: first.height,
                borderRadius: 18,
                duration: 0.45,
                ease: 'power3.inOut',
                onComplete: () => {
                    el.remove();
                    reviewOpenEl = null;
                    card.style.visibility = 'visible';
                }
            });
            reviewBackdrop.classList.remove('active');
        }

        reviewCards.forEach(card => card.querySelector('.card-face').addEventListener('click', () => openReview(card)));

        // ============================================================
        // 3. RELATED PRODUCTS – Living Card (GSAP Shutter – Emerald)
        // ============================================================
        const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

        document.querySelectorAll('.living-card').forEach(card => {
            const img = card.querySelector('.card-img');
            const top = card.querySelector('.shutter-top');
            const bottom = card.querySelector('.shutter-bottom');
            const details = card.querySelector('.card-details');
            const detailsInner = card.querySelector('.card-details-inner');
            const actions = card.querySelector('.card-actions');
            const actionsInner = card.querySelector('.card-actions-inner');
            const icons = card.querySelectorAll('.action-icon');

            if (!supportsHover) return;

            const detailsH = detailsInner.getBoundingClientRect().height;
            const actionsH = actionsInner.getBoundingClientRect().height;
            gsap.set(icons, {
                opacity: 0,
                y: 10
            });

            const tl = gsap.timeline({
                paused: true,
                defaults: {
                    ease: 'power2.inOut'
                }
            });
            tl.addLabel('shutterClose', 0)
                .to([top, bottom], {
                    scaleY: 1,
                    duration: 0.3
                }, 'shutterClose')
                .addLabel('focus', 'shutterClose+=0.22')
                .to(img, {
                    scale: 1.07,
                    duration: 0.4,
                    ease: 'power2.out'
                }, 'focus')
                .addLabel('shutterOpen', 'focus+=0.34')
                .to([top, bottom], {
                    scaleY: 0,
                    duration: 0.32
                }, 'shutterOpen')
                .addLabel('expand', 'shutterOpen+=0.18')
                .to(details, {
                    height: detailsH,
                    duration: 0.42,
                    ease: 'power3.out'
                }, 'expand')
                .to(actions, {
                    height: actionsH,
                    duration: 0.42,
                    ease: 'power3.out'
                }, 'expand')
                .addLabel('actionsIn', 'expand+=0.22')
                .to(icons, {
                    opacity: 1,
                    y: 0,
                    duration: 0.3,
                    stagger: 0.08,
                    ease: 'power2.out'
                }, 'actionsIn');

            card.addEventListener('mouseenter', () => {
                card.classList.add('is-hovering');
                tl.play();
            });
            card.addEventListener('mouseleave', () => {
                card.classList.remove('is-hovering');
                tl.reverse();
            });

            window.addEventListener('resize', () => {
                const dH = detailsInner.getBoundingClientRect().height;
                const aH = actionsInner.getBoundingClientRect().height;
                if (tl.getTweensOf(details)[0]) tl.getTweensOf(details)[0].vars.height = dH;
                if (tl.getTweensOf(actions)[0]) tl.getTweensOf(actions)[0].vars.height = aH;
            });
        });

        // ---- Card Click Navigation ----
        document.querySelectorAll('.living-card').forEach(card => {
            const id = card.dataset.id;
            card.addEventListener('click', function(e) {
                if (e.target.closest('.action-icon')) return;
                window.location.href = 'product.php?id=' + id;
            });
        });

        // ============================================================
        // 4. COLOR SWATCHES – Change Hero Image
        // ============================================================
        document.querySelectorAll('.color-swatch').forEach(swatch => {
            swatch.addEventListener('click', function() {
                const newImg = this.dataset.img;
                if (heroImg && newImg) {
                    heroImg.style.transition = 'opacity 0.3s ease';
                    heroImg.style.opacity = '0';
                    setTimeout(() => {
                        heroImg.src = newImg;
                        heroImg.style.opacity = '1';
                    }, 300);
                }
            });
        });

        // ============================================================
        // 5. MAGNETIC BUTTONS
        // ============================================================
        document.querySelectorAll('.btn-emerald, .btn-outline-emerald').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                const strength = 12;
                btn.style.transform = `translate(${x/strength}px, ${y/strength}px)`;
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translate(0,0)';
            });
        });

        console.log('✅ Product page – All animations loaded!');
    });
</script>
</body>
</html>