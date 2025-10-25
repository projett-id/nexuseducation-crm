<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Event;
use App\Models\News;
use App\Models\StartYourJourney;
use App\Models\PartnerWithUs;
use App\Models\About;
use App\Models\Testimonial;
class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        $country = Country::where('status',1)->get();
        $dataCRM = [
            [
                'img'=>'https://www.si-applications.com/assets/HomePage/map.svg',
                'title'=>'1,000 education institutions in five destinations',
                'desc'=>'Search for and apply to 120,000 courses at over 1,000 universities and colleges in the United Kingdom, Canada, the United States, Ireland, and the UAE.'
            ],
            [
                'img'=>'https://www.si-applications.com/assets/HomePage/mapCity.svg',
                'title'=>'A single application for any course in any country',
                'desc'=>'Our platform provides a unified application form that can be used to apply to multiple universities and programs, reducing redundancy and saving your time.'
            ],
            [
                'img'=>'https://www.si-applications.com/assets/HomePage/laptop.svg',
                'title'=>'Course matching personalised for your students',
                'desc'=>'Our search technology matches students with programs and universities that best fit their academic background, interests, and career goals. Search for a course, confirm requirements, and apply with one click.'
            ],
            [
                'img'=>'https://www.si-applications.com/assets/HomePage/team.png',
                'title'=>'Expert support from your dedicated account manager',
                'desc'=>'StudyIn’s consultants are experts in their target markets. Access to a dedicated consultant and training materials ensure top quality applications for your students. Online webinars and training materials keep you updated on the most recent trends and developments in your markets.'
            ],
            [
                'img'=>'https://www.si-applications.com/assets/HomePage/team_1.svg',
                'title'=>'Generous commissions shares!',
                'desc'=>'Earn competitive commissions on your enrolled students.  StudyIn’s platform allows you to track the application process of your students, and submit your claim for commission with one click.'
            ],
        ];

        return view('home',compact('about','country','dataCRM'));
    }   

    public function about()
    {
        $data = About::first();
        return view('about',compact('data'));
    }   

    public function start_your_journey(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'country' => 'nullable|string|max:100',
                'academic_year_plan' => 'nullable|string|max:100',
                'last_education' => 'nullable|string|max:100',
            ]);
            // Process the form data (e.g., save to database, send email, etc.)
            StartYourJourney::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'academic_year_plan' => $request->academic_year_plan,
                'last_education' => $request->last_education,
            ]); 
            return redirect()->route('start-your-journey-url')->with('success', 'Your information has been submitted successfully.');
        }
        $country = Country::all();
        return view('frontend.start_journey',compact('country'));
    }

    public function partner_with_us(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'organization_name' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'nullable|string',
            ]);
            // Process the form data (e.g., save to database, send email, etc.)
            PartnerWithUs::create([
                'organization_name' => $request->organization_name,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]); 
            return redirect()->route('partner-with-us-url')->with('success', 'Your partnership request has been submitted successfully.');
        }
        return view('frontend.partner_us');
    }

    public function listJourney()
    {
        $data = StartYourJourney::latest()->paginate(10);
        return view('admin.data_start_journey', compact('data'));
    }

    public function listPartner()
    {
        $data = PartnerWithUs::latest()->paginate(10);
        return view('admin.data_partner_us', compact('data'));
    }

    public function aboutForm(Request $request){
        $data = About::first();
        if($request->isMethod('post')){
            $about = About::first();
            $request->validate([
                'address'=>'required',
                'company_name'=>'required',
                'proprietor'=>'required',
                'contact_no'=>'required',
                'email'=>'required',
                'vision'=>'required',
                'mission'=>'required',
                'values'=>'required',
                'about'=>'required',
                'link_maps'=>'required'
            ]);
            $data = $request->all();

            $values = [];

            // decode old values from DB (JSON column)
            $oldValues = $about->values ?? [];

            foreach ($data['values'] as $index => $value) {
                $item = [
                    'name' => $value['name'] ?? null,
                ];

                if (isset($value['img']) && $value['img'] instanceof \Illuminate\Http\UploadedFile) {
                    // delete old file if exists
                    if (isset($oldValues[$index]['img'])) {
                        \Storage::disk('public')->delete('values/' . $oldValues[$index]['img']);
                    }

                    // save new file
                    $filename = time().'_'.$value['img']->getClientOriginalName();
                    $value['img']->storeAs('values', $filename, 'public');
                    $item['img'] = $filename;
                } else {
                    // keep the old image if no new upload
                    if (isset($oldValues[$index]['img'])) {
                        $item['img'] = $oldValues[$index]['img'];
                    }
                }

                $values[] = $item;
            }

            $about->update([
                'company_name' => $data['company_name'],
                'proprietor'   => $data['proprietor'],
                'contact_no'   => $data['contact_no'],
                'email'        => $data['email'],
                'address'      => $data['address'],
                'link_maps'    => $data['link_maps'],
                'about'        => $data['about'],
                'vision'       => $data['vision'],
                'mission'      => $data['mission'],
                'values'       => $values, // will be stored as JSON
            ]);

            return back()->with('success', 'About updated successfully!');

        }
        return view('admin.aboutForm',compact('data'));
    }
}
