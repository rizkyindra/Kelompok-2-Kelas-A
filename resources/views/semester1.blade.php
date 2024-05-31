{{-- Form untuk peminjaman buku --}}
<form action="{{ route('semester1') }}" method="POST">
    @csrf
    <label for="book_title">Judul Buku:</label>
    <input type="text" id="book_title" name="book_title" required>
    
    <label for="borrower_name">Nama Peminjam:</label>
    <input type="text" id="borrower_name" name="borrower_name" required>

    <button type="submit">Pinjam Buku</button>
</form>