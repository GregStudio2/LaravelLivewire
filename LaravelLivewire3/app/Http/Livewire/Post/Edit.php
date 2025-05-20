<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    use WithFileUploads;

    //id post
    public $postID;

    //image
    public $image;

    #[Rule('required', message: 'Masukkan Judul Post')]
    public $title;

    #[Rule('required', message: 'Masukkan Isi Post')]
    #[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
    public $content;

    public function mount($id)
    {
        //get post
        $post = Post::find($id);

        //assign
        $this->postID   = $post->id;
        $this->title    = $post->title;
        $this->content  = $post->content;
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        //get post
        $post = Post::find($this->postID);

        //check if image
        if ($this->image) {

            //store image in storage/app/public/post
            $this->image->storeAs('public/post', $this->image->hashName());

            //update post
            $post->update([
                'image' => $this->image->hashName(),
                'title' => $this->title,
                'content' => $this->content,
            ]);
        } else {

            //update post
            $post->update([
                'title' => $this->title,
                'content' => $this->content,
            ]);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('post.index');
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.post.edit');
    }
}
