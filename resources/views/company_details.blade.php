<!DOCTYPE html>
<html>

<head>
    <title>Company Details Form</title>
</head>

<body>
    <h2>Enter Your Company Details</h2>

    @if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('company.details.store', ['user' => $user->id]) }}">
        @csrf

        <label>Company Name:</label><br>
        <input type="text" name="company_name" required><br><br>

        <label>Official Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" required><br><br>

        <label>Website:</label><br>
        <input type="url" name="website"><br><br>

        <label>Business Type:</label><br>
        <select name="business_type" required>
            <option value="ecommerce">E-Commerce</option>
            <option value="services">Services</option>
            <option value="education">Education</option>
            <option value="others">Others</option>
        </select><br><br>

        <label>Business Size:</label><br>
        <select name="business_size" required>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br><br>

        <label>Industry:</label><br>
        <input type="text" name="industry"><br><br>

        <label>Country:</label><br>
        <input type="text" name="country" required><br><br>

        <label>State:</label><br>
        <input type="text" name="state" required><br><br>

        <label>City:</label><br>
        <input type="text" name="city" required><br><br>

        <label>Address:</label><br>
        <textarea name="address" required></textarea><br><br>

        <label>Postal Code:</label><br>
        <input type="text" name="postal_code"><br><br>

        <label>Timezone:</label><br>
        <input type="text" name="timezone" value="Asia/Kolkata"><br><br>

        <label>Currency:</label><br>
        <input type="text" name="currency" value="INR"><br><br>

        <label>Language:</label><br>
        <input type="text" name="language" value="en"><br><br>

        <label>GSTIN:</label><br>
        <input type="text" name="gstin"><br><br>

        <button type="submit">Save Details</button>
    </form>
</body>

</html>