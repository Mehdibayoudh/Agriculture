<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .suggestion-box {
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            top: 100%; /* Move below the input field */
            left: 100%; /* Position to the right of the input field */
            width: 300px; /* Set a fixed width */
            z-index: 1000;
            background-color: white;
            margin-left: 10px; /* Add a gap between the input field and suggestions box */
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }

        .autocomplete-container {
            position: relative;
        }

    </style>
</head>
<body>
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Event Details</h3>
                <div class="card-body">
                    <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form">
                        @csrf
                        @if($event->exists)
                            @method('PUT') <!-- Use PUT for updates -->
                        @endif

                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="titre" placeholder="Event Title" class="form-control" value="{{ old('titre', $event->titre) }}" required>
                            @error('titre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group input-group-outline mb-3">
                            <textarea name="description" class="form-control"  placeholder="Event Description" required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group input-group-outline mb-3">
                            <input type="datetime-local" name="date" class="form-control" placeholder="Event Date" value="{{ old('date', $event->date ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Location input with suggestion box -->
                        <div class="autocomplete-container input-group input-group-outline mb-3">
                            <input type="text" id="autocomplete" name="localisation" placeholder="Event Location" class="form-control" value="{{ old('localisation', $event->localisation) }}" required>
                            @error('localisation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="suggestion-box" class="suggestion-box"></div> <!-- Moved inside relative container -->
                        </div>

                        <!-- Other form fields like sponsors -->

                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input" type="checkbox" value="" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save Event</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-page -->

<script>
    const apiKey = '279e76241dc64c75b9bf7bca18e50a36'; // Replace with your OpenCage API key
    let timeout = null;

    document.getElementById('autocomplete').addEventListener('input', function() {
        clearTimeout(timeout);
        const query = this.value;

        // Wait 300ms after user stops typing
        timeout = setTimeout(() => {
            if (query.length > 2) { // Only make request if query is longer than 2 characters
                fetchSuggestions(query);
            }
        }, 300);
    });

    function fetchSuggestions(query) {
        const url = `https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(query)}&key=${apiKey}&limit=5`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                displaySuggestions(data.results);
            })
            .catch(error => console.error('Error fetching suggestions:', error));
    }

    function displaySuggestions(suggestions) {
        // Clear any previous suggestions
        const suggestionBox = document.getElementById('suggestion-box');
        suggestionBox.innerHTML = '';

        suggestions.forEach((suggestion) => {
            const suggestionItem = document.createElement('div');
            suggestionItem.textContent = suggestion.formatted;
            suggestionItem.classList.add('suggestion-item');

            // On click, set the value to the selected suggestion
            suggestionItem.addEventListener('click', function() {
                document.getElementById('autocomplete').value = suggestion.formatted;
                suggestionBox.innerHTML = ''; // Clear suggestions after selection
            });

            suggestionBox.appendChild(suggestionItem);
        });
    }
</script>
</body>
</html>
