<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Food Ordering Cart
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
  <header class="bg-white shadow">
   <div class="container mx-auto px-6 py-3 flex justify-between items-center">
    <div>
     <a class="text-gray-800 text-xl font-bold" href="#">
      FoodieCart
     </a>
    </div>
    <div class="flex items-center">
     <a class="text-gray-800 text-sm font-medium mx-2" href="#">
      Home
     </a>
     <a class="text-gray-800 text-sm font-medium mx-2" href="#">
      Menu
     </a>
     <a class="text-gray-800 text-sm font-medium mx-2" href="#">
      Contact
     </a>
     <a class="text-gray-800 text-sm font-medium mx-2" href="#">
      Cart
     </a>
    </div>
   </div>
  </header>
  <main class="container mx-auto px-6 py-8">
   <h2 class="text-2xl font-semibold text-gray-800">
    Your Food Cart
   </h2>
   <div class="mt-6">
    <div class="flex flex-col lg:flex-row lg:space-x-6">
     <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
       <h3 class="text-lg font-medium text-gray-800">
        Items in your cart
       </h3>
       <span class="text-sm text-gray-600">
        3 items
       </span>
      </div>
      <div class="space-y-4">
       <div class="flex items-center justify-between">
        <img alt="Image of a delicious pepperoni pizza" class="w-20 h-20 object-cover rounded" height="100" src="https://storage.googleapis.com/a1aa/image/KyRlPNGrWS7sLZHqI4ke4nMZhjwCJrXUZgTs4CtvwWxdOu5JA.jpg" width="100"/>
        <div class="flex-1 ml-4">
         <h4 class="text-lg font-medium text-gray-800">
          Pepperoni Pizza
         </h4>
         <p class="text-sm text-gray-600">
          Size: Large
         </p>
        </div>
        <div class="flex items-center">
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-minus">
          </i>
         </button>
         <span class="mx-2 text-lg text-gray-800">
          1
         </span>
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-plus">
          </i>
         </button>
        </div>
        <span class="text-lg font-medium text-gray-800">
         $15.00
        </span>
        <button class="text-red-500 hover:text-red-600 ml-4">
         <i class="fas fa-trash">
         </i>
        </button>
       </div>
       <div class="flex items-center justify-between">
        <img alt="Image of a fresh Caesar salad" class="w-20 h-20 object-cover rounded" height="100" src="https://storage.googleapis.com/a1aa/image/Dzs7yW9p7w5oPptVnlsKhpwPH8z9larfjE0seDfCbSFw54mnA.jpg" width="100"/>
        <div class="flex-1 ml-4">
         <h4 class="text-lg font-medium text-gray-800">
          Caesar Salad
         </h4>
         <p class="text-sm text-gray-600">
          Size: Medium
         </p>
        </div>
        <div class="flex items-center">
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-minus">
          </i>
         </button>
         <span class="mx-2 text-lg text-gray-800">
          2
         </span>
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-plus">
          </i>
         </button>
        </div>
        <span class="text-lg font-medium text-gray-800">
         $10.00
        </span>
        <button class="text-red-500 hover:text-red-600 ml-4">
         <i class="fas fa-trash">
         </i>
        </button>
       </div>
       <div class="flex items-center justify-between">
        <img alt="Image of a refreshing lemonade drink" class="w-20 h-20 object-cover rounded" height="100" src="https://storage.googleapis.com/a1aa/image/npUtD24aevzON69GXELacHEXNeKeGn82SdzHwRj97Dxu54mnA.jpg" width="100"/>
        <div class="flex-1 ml-4">
         <h4 class="text-lg font-medium text-gray-800">
          Lemonade
         </h4>
         <p class="text-sm text-gray-600">
          Size: Large
         </p>
        </div>
        <div class="flex items-center">
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-minus">
          </i>
         </button>
         <span class="mx-2 text-lg text-gray-800">
          1
         </span>
         <button class="text-gray-500 hover:text-gray-600">
          <i class="fas fa-plus">
          </i>
         </button>
        </div>
        <span class="text-lg font-medium text-gray-800">
         $5.00
        </span>
        <button class="text-red-500 hover:text-red-600 ml-4">
         <i class="fas fa-trash">
         </i>
        </button>
       </div>
      </div>
     </div>
     <div class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow-md mt-6 lg:mt-0">
      <h3 class="text-lg font-medium text-gray-800">
       Order Summary
      </h3>
      <div class="mt-4">
       <div class="flex justify-between">
        <span class="text-sm text-gray-600">
         Subtotal
        </span>
        <span class="text-sm text-gray-800">
         $40.00
        </span>
       </div>
       <div class="flex justify-between mt-2">
        <span class="text-sm text-gray-600">
         Delivery Fee
        </span>
        <span class="text-sm text-gray-800">
         $5.00
        </span>
       </div>
       <div class="flex justify-between mt-2">
        <span class="text-sm text-gray-600">
         Tax
        </span>
        <span class="text-sm text-gray-800">
         $3.00
        </span>
       </div>
       <div class="flex justify-between mt-4 border-t pt-4">
        <span class="text-lg font-medium text-gray-800">
         Total
        </span>
        <span class="text-lg font-medium text-gray-800">
         $48.00
        </span>
       </div>
       <button class="w-full mt-6 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
        Proceed to Checkout
       </button>
      </div>
     </div>
    </div>
   </div>
  </main>
 </body>
</html>
