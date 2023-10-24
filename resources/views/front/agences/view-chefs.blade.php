<div class="custom-alert">
    <div class="custom-alert-content">
        <button class="custom-alert-close" onclick="closeAlert()">&times;</button>
        <div id="customAlertMessage">
            <h2>Chef Details:</h2>
            <ul>
                @foreach($chefs as $chef)
                    <li>{{ $chef->nom }} {{ $chef->prenom }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
