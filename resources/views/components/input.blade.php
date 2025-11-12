@props(['name'])

<div>
    <input class="input" name="{{ $name }}" {{ $attributes }} />
    @error($name)
    <div class="text-sm text-error">{{ $message }}</div>
    @enderror
</div>
