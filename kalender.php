<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender dengan Pengingat</title>
    <style>
        /* CSS untuk penampilan kalender dan pengingat */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .notification {
            display: none;
            background: #ffc;
            padding: 10px;
            border: 1px solid #ff0;
            margin-top: 20px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mei</h1>
        <table id="calendar">
            <thead>
                <tr>
                    <th>Minggu</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                </tr>
            </thead>
            <tbody id="calendar-body">
                <!-- Baris kalender akan diisi oleh JavaScript -->
            </tbody>
        </table>
        <input type="datetime-local" id="reminderTime">
        <button onclick="setReminder()">Setel Pengingat</button>
        <div id="notification" class="notification">
            <p>Waktunya untuk mengingat!</p>
        </div>
    </div>
    <script>
        // JavaScript untuk mengisi kalender dan mengatur pengingat
        function generateCalendar() {
            const calendarBody = document.getElementById('calendar-body');
            const today = new Date();
            const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
            const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            
            let date = 1;
            const rows = [];
            for (let i = 0; i < 6; i++) {
                const row = [];
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDayOfMonth.getDay()) {
                        row.push('');
                    } else if (date > lastDayOfMonth.getDate()) {
                        break;
                    } else {
                        row.push(date);
                        date++;
                    }
                }
                rows.push(row);
            }
            
            calendarBody.innerHTML = '';
            rows.forEach(row => {
                const tr = document.createElement('tr');
                row.forEach(day => {
                    const td = document.createElement('td');
                    td.innerText = day;
                    tr.appendChild(td);
                });
                calendarBody.appendChild(tr);
            });
        }
        
        function setReminder() {
            const reminderTime = document.getElementById('reminderTime').value;
            if (!reminderTime) {
                alert('Silakan pilih waktu untuk pengingat Anda!');
                return;
            }
            
            const reminderDate = new Date(reminderTime);
            const now = new Date();
            
            if (reminderDate < now) {
                alert('Waktu pengingat harus di masa depan!');
                return;
            }
            
            const timeToReminder = reminderDate - now;
            
            setTimeout(() => {
                document.getElementById('notification').style.display = 'block';
            }, timeToReminder);
            
            alert('Pengingat telah disetel!');
        }
        
        window.onload = generateCalendar;
    </script>
</body>
</html>
