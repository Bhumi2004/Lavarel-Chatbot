<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VultrService;

class ChatbotController extends Controller
{
    private $vultrService;

    public function __construct(VultrService $vultrService)
    {
        $this->vultrService = $vultrService;
    }

    public function index()
    {
        return view('chatbot.index'); // Ensure this Blade file exists
    }

    public function handleMessage(Request $request, VultrService $vultrService)
    {
        $userMessage = strtolower($request->input('message'));
    
        // Synonyms for common questions
        $healthyPregnancyKeywords = ['stay healthy during pregnancy', 'how to maintain health during pregnancy', 'pregnancy health tips', 'how to be healthy while pregnant'];
        $symptomsKeywords = ['common pregnancy symptoms', 'what are the early signs of pregnancy', 'pregnancy symptoms to watch out for'];
        $stagesOfPregnancyKeywords = ['stages of pregnancy', 'pregnancy stages breakdown', 'what are the trimesters of pregnancy'];
        $dietKeywords = ['diet during pregnancy', 'what should i eat while pregnant', 'pregnancy nutrition', 'healthy food during pregnancy'];
        $stressKeywords = ['managing stress during pregnancy', 'how to reduce stress while pregnant', 'pregnancy stress management'];
        $babyDevelopmentKeywords = ['baby development during pregnancy', 'how is my baby growing', 'fetal development stages'];
        $hospitalVisitKeywords = ['when should i go to the hospital during pregnancy', 'hospital visit during labor', 'how to know when to go to the hospital'];
        $breastfeedingKeywords = ['how to prepare for breastfeeding', 'breastfeeding tips', 'nursing advice'];
        $postpartumKeywords = ['postpartum care', 'what to do after birth', 'postbirth care tips'];
    
        // Check for related keywords and return the corresponding reply
        if ($this->containsKeywords($userMessage, $healthyPregnancyKeywords)) {
            $reply = "To stay healthy during pregnancy, it’s essential to eat a balanced diet, stay hydrated, exercise regularly (with your doctor’s approval), and get enough rest. Regular prenatal visits are also important.";
        } elseif ($this->containsKeywords($userMessage, $symptomsKeywords)) {
            $reply = "Common pregnancy symptoms include nausea, fatigue, frequent urination, tender breasts, and mood swings. If you experience any unusual symptoms, it's best to consult with your healthcare provider.";
        } elseif ($this->containsKeywords($userMessage, $stagesOfPregnancyKeywords)) {
            $reply = "Pregnancy is divided into three trimesters: the first trimester (0-12 weeks), the second trimester (13-26 weeks), and the third trimester (27-40 weeks). Each trimester brings different changes and milestones.";
        } elseif ($this->containsKeywords($userMessage, $dietKeywords)) {
            $reply = "It's important to eat a well-rounded diet that includes fruits, vegetables, whole grains, lean proteins, and dairy. Foods rich in folic acid, iron, and calcium are essential. Avoid raw or undercooked meats, seafood, and eggs.";
        } elseif ($this->containsKeywords($userMessage, $stressKeywords)) {
            $reply = "To manage stress during pregnancy, try relaxation techniques such as deep breathing, meditation, or prenatal yoga. It's also helpful to talk with a supportive partner or counselor if you feel overwhelmed.";
        } elseif ($this->containsKeywords($userMessage, $babyDevelopmentKeywords)) {
            $reply = "Your baby's development changes week by week! During the first trimester, major organs and systems begin to form. In the second trimester, your baby grows rapidly and starts moving. By the third trimester, your baby is preparing for birth.";
        } elseif ($this->containsKeywords($userMessage, $hospitalVisitKeywords)) {
            $reply = "You should go to the hospital when your contractions are 5 minutes apart, last for 1 minute, and continue for at least 1 hour. You should also go if your water breaks or if you have concerns about your health or your baby.";
        } elseif ($this->containsKeywords($userMessage, $breastfeedingKeywords)) {
            $reply = "Preparing for breastfeeding involves learning about latch techniques, understanding how often to feed, and getting support from a lactation consultant if needed. It’s also important to stay hydrated and well-nourished.";
        } elseif ($this->containsKeywords($userMessage, $postpartumKeywords)) {
            $reply = "After birth, it's important to take care of yourself as well as your baby. Make sure to rest, stay hydrated, and eat nutritious foods. If you're breastfeeding, ensure you're getting proper support. Don't hesitate to reach out to your healthcare provider if you have any concerns.";
        } else {
            $reply = "I'm here to help! Could you please clarify your question or let me know how I can assist you with your pregnancy journey?";
        }
    
        return response()->json(['reply' => $reply]);
    }
    
    // Helper function to check if the message contains any of the given keywords
    private function containsKeywords($message, $keywords)
    {
        foreach ($keywords as $keyword) {
            if (strpos($message, strtolower($keyword)) !== false) {
                return true;
            }
        }
        return false;
    }
    
}

