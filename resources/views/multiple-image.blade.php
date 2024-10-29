{{--  blade  --}}
@if ($referral && !empty($referral->image) && is_array($referral->image))
    <img src="{{ asset(str_replace('public/', 'storage/', $referral->image[0])) }}" alt="Image"
        style="width: 100px; height: 70px;">
@else
    <p>No images found.</p>
@endif



{{--  pdf  --}}
@if ($data && !empty($data->image) && is_array($data->image))
    @foreach ($data->image as $imagePath)
        <img src="{{ public_path(str_replace('public/', 'storage/', $imagePath)) }}" alt="Image"
            style="width: 100px; height: 100px;">
    @endforeach
@else
    <p>No images found.</p>
@endif


{{--  controller  --}}


$imagePaths = [];

if ($request->hasFile('image')) {
foreach ($request->file('image') as $image) {
$imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
$path = $image->storeAs('public/evidence', $imageName);
$imagePaths[] = $path;
}
}
