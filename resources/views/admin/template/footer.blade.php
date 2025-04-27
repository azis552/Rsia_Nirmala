<!-- Javascript -->
<script async src="//www.instagram.com/embed.js"></script>
<script src="{{ asset('') }}assets/plugins/popper.min.js"></script>
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="{{ asset('') }}assets/plugins/chart.js/chart.min.js"></script>
<script src="{{ asset('') }}assets/js/index-charts.js"></script>

<!-- Page Specific JS -->
<script src="{{ asset('') }}assets/js/app.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

@if (Auth::check() && Auth::user()->role === 'admin')
    <div id="admin-notifikasi" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

    {{-- Sound Notification --}}
    <audio id="notif-sound" preload="auto">
        <source src="{{ asset('sound/iphone.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>
        // Enable Pusher logging — disable in production!
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        var channel = pusher.subscribe('admin-notifikasi');
        channel.bind('App\\Events\\NotifikasiRujukanAdmin', function(data) {
            console.log('📢 Notifikasi masuk:', data);
            let html = `
                <div style="
                    background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
                    padding: 16px 20px;
                    margin-bottom: 12px;
                    border-left: 6px solid #4CAF50;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    color: #333;
                    max-width: 320px;
                ">
                    <div style="font-weight: bold; font-size: 16px; margin-bottom: 6px;">
                        📢 ${data.judul}
                    </div>
                    <div style="font-size: 14px; margin-bottom: 10px;">
                        ${data.isi}
                    </div>
                    <a href="${data.link}" target="_blank" style="
                        display: inline-block;
                        padding: 6px 12px;
                        background-color: #4CAF50;
                        color: white;
                        text-decoration: none;
                        font-size: 13px;
                        border-radius: 5px;
                        transition: background-color 0.3s ease;
                    " onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">
                        🔍 Lihat Detail
                    </a>
                </div>
            `;
            // Mainkan suara notifikasi
            const audio = document.getElementById('notif-sound');
            if (audio) {
                audio.currentTime = 0;
                audio.play().catch(e => console.log('🔇 Suara tidak bisa dimainkan otomatis:', e));
            }
            $('#admin-notifikasi').append(html);

            // Hapus notifikasi setelah 10 detik
            setTimeout(() => {
                $('#admin-notifikasi div:first').fadeOut(500, function() {
                    $(this).remove();
                });
            }, 100000);
        });
    </script>
@endif

@if (Auth::check())
    <div id="admin-notifikasi" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>
    {{-- Sound Notification --}}
    <audio id="notif-sound" preload="auto">
        <source src="{{ asset('sound/iphone.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        var userId = {{ Auth::id() }};
        var channel = pusher.subscribe('private-user.' + userId);

        channel.bind('App\\Events\\NotifikasiRujukanUser', function(data) {
            let html = `
                <audio autoplay>
                    <source src="/audio/iphone.mp3" type="audio/mpeg">
                </audio>
                <div style="background: #fff; padding: 15px; border-left: 5px solid #2196F3; margin-bottom: 10px; border-radius: 8px;">
                    <strong>${data.judul}</strong><br>
                    ${data.isi}<br>
                    <a href="${data.link}" target="_blank">🔗 Lihat Detail</a>
                </div>
            `;
            // Mainkan suara notifikasi
            const audio = document.getElementById('notif-sound');
            if (audio) {
                audio.currentTime = 0;
                audio.play().catch(e => console.log('🔇 Suara tidak bisa dimainkan otomatis:', e));
            }
            $('#admin-notifikasi').append(html);

            setTimeout(() => {
                $('#admin-notifikasi div:first').fadeOut(500, function () {
                    $(this).remove();
                });
            }, 10000);
        });
    </script>
@endif



</body>

</html>
