// Fungsi untuk memperbarui waktu setiap detik
function updateTime() {
    var currentTime = new Date().toLocaleTimeString();  
    // document.getElementById("timeDisplay").innerHTML = currentTime; 
    document.getElementById("timeDisplayTable").innerHTML = currentTime; // Elemen dalam tabel
  }
  
  // Memperbarui waktu setiap detik
  // setInterval(updateTime, 1000);
  
  // Fungsi untuk mengaktifkan dan menonaktifkan pemantauan suhu
  let isMonitoring = false;
  let temperatureInterval;
  
  function toggleTemperatureMonitoring() {
    if (isMonitoring) {
      clearInterval(temperatureInterval); 
      document.getElementById("monitorButton").innerText = "Start Monitoring"; 
      alert("Temperature monitoring stopped.");
    } else {
      startTemperatureMonitoring(); 
      document.getElementById("monitorButton").innerText = "Stop Monitoring"; 
      alert("Temperature monitoring started.");
    }
    isMonitoring = !isMonitoring;
  }
  
  // // Fungsi untuk memulai pemantauan suhu setiap 10 detik
  // function startTemperatureMonitoring() {
  //   temperatureInterval = setInterval(function () {
  //     fetch("/temperature") 
  //       .then(response => response.json())
  //       .then(data => {
  //         document.getElementById("temperature").innerText = data; 
  //       });
  //   }, 10000); 
  // }

  // Fungsi untuk memulai pemantauan suhu setiap 10 detik
function startTemperatureMonitoring() {
    temperatureInterval = setInterval(function () {
        fetch("/temperature") // Meminta data suhu dari server
            .then(response => response.json())
            .then(data => {
                // Memperbarui data suhu
                document.getElementById("temperature").innerText = data.temperature; 

                // Mendapatkan waktu saat ini
                const currentTime = new Date().toLocaleTimeString();

                // Memperbarui kolom waktu
                document.getElementById("receivedTime").innerText = currentTime;
            })
            .catch(error => {
                console.error("Error fetching temperature data:", error);
            });
    }, 10000); // Pembaruan setiap 10 detik
}


// // Event listener untuk membuka modal
// document.getElementById("addRoomButton").addEventListener("click", function () {
//   const addRoomModal = new bootstrap.Modal(document.getElementById("addRoomModal"));
//   addRoomModal.show();
// });

// // Event listener untuk submit form
// document.getElementById("addRoomForm").addEventListener("submit", function (e) {
//   e.preventDefault();
//   const roomName = document.getElementById("roomName").value;
//   const roomType = document.getElementById("roomType").value;
  
//   // Tambahkan logika untuk menyimpan data ruangan baru ke server atau tabel
//   console.log("Ruangan baru:", { roomName, roomType });
  
//   // Tutup modal
//   bootstrap.Modal.getInstance(document.getElementById("addRoomModal")).hide();
// });

// Tambah ruang

