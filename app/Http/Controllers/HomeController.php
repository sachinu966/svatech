<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Binary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Home()
    {
        Binary::truncate();
        $res=Binary::create(['value'=>1]);
        $level=1;
        while ($level <= 5) {
            $result = Binary::where('left_child',NULL)->orWhere('right_child',NULL)->get();
            foreach($result as $r) {
              if ($r->left_child === null) {
                Binary::create([
                    'value'=>$r->value*2,
                    'left_child'=>$r->id
                ]);
                // $this->db->query("INSERT INTO binary_tree (value, left_child) VALUES (" . $row['value'] * 2 . ", " . $row['id'] . ")");
              } else {
                Binary::create([
                    'value'=>($r->value*2)+1,
                    'right_child'=>$r->id
                ]);
                // $this->db->query("INSERT INTO binary_tree (value, right_child) VALUES (" . ($row['value'] * 2 + 1) . ", " . $row['id'] . ")");
              }
            }
            $level++;
          }
          $data=Binary::get();
        return view('welcome',compact('data'));
    }
}
