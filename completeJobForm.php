<!-- 
Emma Saliu
C00297032
GARAGE PROJECT
complete job form
-->
<?php
include 'DBconnection.php';

// Query for jobs in progress with their job type names.
$stmt = $con->prepare("SELECT j.Job_ID, jt.Job_Type_Name AS Job_Name 
                       FROM Job j 
                       JOIN Job_Type jt ON j.Job_Type_ID = jt.Job_Type_ID
                       WHERE j.Status IS NULL OR j.Status = '' OR j.Status = '0'");
$stmt->execute();
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Complete Job | GMS</title>
  <link rel="stylesheet" href="./Assets/css/ShowSuppliers.css"/>
  <script>
    // Adds an additional spare part row.
    function addSparePartRow() {
      var table = document.getElementById("sparePartsTable");
      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      cell1.innerHTML = '<input type="text" name="spare_part_stock[]" required>';
      cell2.innerHTML = '<input type="number" name="spare_part_qty[]" required min="1">';
    }
    
    // Optional: Fetch additional job details when a job is selected.
    function fetchJobDetails(jobId) {
      if (!jobId) {
        document.getElementById("job_details").innerHTML = "";
        return;
      }
      fetch(`fetch_job_details.php?job_id=${jobId}`)
        .then(response => response.text())
        .then(html => {
          document.getElementById("job_details").innerHTML = html;
        });
    }
  </script>
</head>
<body>
  <main class="main_form_container">
    <div class="div">
      <div class="form_title">
        <h1>Complete Job</h1>
      </div>
      <form method="POST" action="completeJob.php" class="form">
        <!-- Job Selection Drop-Down -->
        <div class="inputMain">
          <label for="job_id">Select Job:</label>
          <select name="job_id" id="job_id" class="drop_down_list" required onchange="fetchJobDetails(this.value)">
            <option value="">--Select a job--</option>
            <?php foreach ($jobs as $job): ?>
              <option value="<?php echo htmlspecialchars($job['Job_ID']); ?>">
                <?php echo "Job ID: " . htmlspecialchars($job['Job_ID']) . " - " . htmlspecialchars($job['Job_Name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <!-- Job Details (loaded dynamically via AJAX if needed) -->
        <div id="job_details" class="inputMain">
          <!-- Additional job details can appear here. -->
        </div>
        
        <!-- Total Time Taken -->
        <div class="inputMain">
          <label for="time_taken">Total Time Taken (in minutes):</label>
          <input type="number" name="time_taken" id="time_taken" required min="1">
        </div>
        
        <!-- Spare Parts Used Section -->
        <div class="inputMain">
          <h2>Spare Parts Used</h2>
          <table id="sparePartsTable" border="1">
            <tr>
              <th>Stock Number</th>
              <th>Quantity</th>
            </tr>
            <tr>
              <td><input type="text" name="spare_part_stock[]" required></td>
              <td><input type="number" name="spare_part_qty[]" required min="1"></td>
            </tr>
          </table>
          <button type="button" onclick="addSparePartRow()">Add Another Spare Part</button>
        </div>
        
        <!-- Form Buttons -->
        <div class="form_buttons">
          <input type="reset" value="Cancel" class="formButton">
          <input type="submit" name="complete_job" value="Complete Job" class="formButton">
        </div>
      </form>
    </div>
  </main>
</body>
</html>