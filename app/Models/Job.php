<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings'; //because our db table name is not Job, it's job_listings

    protected $fillable = ['employer_id', 'title', 'salary']; //mass assignment

    //protected $guarded = []; //makes every column mass assignable

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id"); //since we aren't using laravel's default table jobs
    }





/* CODE BEFORE USING MODEL */
    // public static function all(): array
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'title' => 'Director',
    //             'salary' => '$25,000'
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Programmer',
    //             'salary' => '$40,000'
    //         ],
    //         [
    //             'id' => 3,
    //             'title' => 'Boss',
    //             'salary' => '$50,000'
    //         ],
    //     ];
    // }

    // public static function find(int $id): array
    // {
    //     $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

    //     if (!$job) {
    //         abort(404);
    //     } else {
    //         return $job;
    //     }
    // }
}
