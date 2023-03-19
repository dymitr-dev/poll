<?php
require 'db.php';

// Check if the user has voted (using the cookie)
if (isset($_COOKIE['voted'])) {
  // Display the poll results
  $stmt = $pdo->query("SELECT COUNT(*) FROM votes WHERE vote = 'yes'");
  $yes_count = $stmt->fetchColumn();
  $stmt = $pdo->query("SELECT COUNT(*) FROM votes WHERE vote = 'no'");
  $no_count = $stmt->fetchColumn();

  $total_count = $yes_count + $no_count;
  $yes_percentage = $total_count > 0 ? round(($yes_count / $total_count) * 100) : 0;
  $no_percentage = $total_count > 0 ? round(($no_count / $total_count) * 100) : 0;

  echo '
    <div style="text-align: center;">
      <canvas style="margin: 0 auto;" id="poll-chart"></canvas>
      <h3 style="margin-bottom: 0;">Total votes: ' . $total_count . '</h3>
      <div id="poll-results">
        <p>Yes: ' . $yes_count . ' (' . $yes_percentage . '%)</p>
        <p>No: ' . $no_count . ' (' . $no_percentage . '%)</p>
      </div>
    </div>
  ';

  // Generate chart using Chart.js library

  echo '
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        const ctx = document.getElementById("poll-chart").getContext("2d");
        const chart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: ["Yes", "No"],
            datasets: [{
              label: "Poll Results",
              data: [' . $yes_count . ', ' . $no_count . '],
              backgroundColor: [
                "#ff2e63",
                "#30e3ca",
              ],
              borderColor: [
                "#ff2e63",
                "#30e3ca",
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: false,
            maintainAspectRatio: false,
          }
        });
      </script>
    ';
}
