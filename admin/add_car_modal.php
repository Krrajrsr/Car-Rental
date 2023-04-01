<html>
    <head>
    <link rel="stylesheet" href="css/add_car.css">
</head>
<body>
    <div id="add-car-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="post" enctype="multipart/form-data" action="add_car.php">
      <label>Model:</label>
      <input type="text" name="model" required>
      <label>Seating Capacity:</label>
      <input type="number" name="seating_capacity" required>
      <label>Car Number:</label>
      <input type="text" name="car_number" required>
      <label>Rent:</label>
      <input type="number" name="rent_per_day" required>
      <label>Photo:</label>
      <input type="file" name="photo" accept="image/*" required>
      <button type="submit" name="save">Save</button>
      <button type="button" class="cancel">Cancel</button>
    </form>
  </div>
</div>

</body>
</html>
