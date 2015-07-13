<?hh

namespace App\Http\Controllers;

use App\Model\LibNews;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LibraryController extends Controller
{
    public function news(): View
    {
        return view('library.news.list');
    }

    public function showNews($id): View
    {
        $news = LibNews::findOrNew($id);
        $data = compact($news);
        return view('library.news.view', $data);
    }
}
