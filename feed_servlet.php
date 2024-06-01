<?php

require_once("connect.php");
require_once("feed_persistence.php");

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    header("Location: /pulse_app_2/pulse_app/index.php");
    exit();
}


$pulse = getBpm($user_id, $conn);
$advice = '';

if ($pulse >= 80) {
    $advice = "• Enjoy the Moment: Happiness-induced elevated heart rates are generally positive, so take time to enjoy and savor the moment.
        • Stay Hydrated: Drink plenty of water to stay hydrated, which can help maintain a healthy heart rate.
        • Practice Deep Breathing: Engage in deep breathing exercises to help regulate your heart rate and promote relaxation.
        • Engage in Light Physical Activity: If you feel too excited, light physical activity like walking can help balance your energy levels.
        • Monitor Your Heart Rate: Keep an eye on your heart rate to ensure it returns to normal levels after the excitement subsides.
        • Avoid Overstimulation: While it's great to be happy, avoid overstimulating activities that might further elevate your heart rate excessively.
        • Listen to Your Body: Pay attention to how you feel and if you experience any discomfort, take a moment to rest and calm down.
        • Consult with a Doctor: If you have any underlying health conditions or if the elevated heart rate persists, consider consulting a healthcare professional for personalized advice.";
} elseif ($pulse >= 60 && $pulse < 80) {
    $advice = "• Maintain a Healthy Lifestyle: Continue engaging in regular physical activity, eating a balanced diet, and getting enough sleep to support overall heart health.
        • Practice Mindfulness: Engage in mindfulness or meditation practices to enjoy and enhance your sense of happiness while maintaining a stable heart rate.
        • Stay Hydrated: Keep yourself well-hydrated by drinking plenty of water throughout the day.
        • Enjoy the Moment: Take time to fully experience and appreciate the positive emotions you are feeling.
        • Monitor Heart Rate Regularly: Use a fitness tracker or heart rate monitor to keep track of your heart rate patterns and ensure they remain within a healthy range.
        • Relaxation Techniques: Incorporate relaxation techniques such as deep breathing exercises, yoga, or gentle stretching into your routine to maintain a calm and steady heart rate.
        • Social Connections: Spend time with loved ones and engage in activities that bring you joy and happiness, contributing to emotional well-being and a stable heart rate.
        • Avoid Excessive Stress: While feeling happy, be mindful of avoiding stressors that could negatively impact your heart rate and overall well-being.
        • Regular Check-ups: Ensure you have regular health check-ups with your healthcare provider to monitor your heart health and overall well-being.";
} else {
    $advice = "• Practice Self-Care: Engage in activities that promote relaxation and self-care, such as taking a warm bath, reading a book, or spending time in nature.
        • Deep Breathing Exercises: Practice deep breathing exercises to help calm your mind and regulate your heart rate.
        • Talk to Someone: Reach out to friends, family, or a mental health professional to talk about your feelings. Sharing your emotions can help reduce stress and stabilize your heart rate.
        • Mindfulness and Meditation: Engage in mindfulness or meditation practices to help manage emotions and maintain a stable heart rate.
        • Stay Hydrated: Drink plenty of water to keep your body well-hydrated, which can help maintain a steady heart rate.
        • Gentle Physical Activity: Engage in gentle physical activities like walking or yoga to help release endorphins and improve your mood.
        • Healthy Diet: Eat a balanced diet rich in fruits, vegetables, and whole grains to support overall health and emotional well-being.
        • Limit Stimulants: Avoid excessive caffeine or nicotine, which can increase heart rate and exacerbate feelings of sadness or anxiety.
        • Adequate Sleep: Ensure you get enough rest and maintain a regular sleep schedule to support emotional health and heart rate stability.
        • Professional Help: If feelings of sadness persist or become overwhelming, consider seeking help from a mental health professional for additional support and guidance.";
}


?>