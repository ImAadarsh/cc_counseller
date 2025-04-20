-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 04:54 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u954141192_campus_coach`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `subtitle` varchar(1000) NOT NULL,
  `content` longtext NOT NULL,
  `category_id` int(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `quote` varchar(500) DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `visit` int(255) NOT NULL DEFAULT 0,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `subtitle`, `content`, `category_id`, `author_name`, `icon`, `banner`, `quote`, `tags`, `visit`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'The #1 strategy for inclusive classrooms – remote and in person.', 'Based on my experience working with hundreds of teachers in numerous contexts, I’d suggest that one of the strategies with the biggest impact on the overall effectiveness of lessons is the routine use of cold-call questioning. More and more I find that, rather than merely promoting it, I am strongly advocating it, basically saying: every teacher should use cold calling as their default questioning mode. I feel strongly about it.', '<p>Why? Because, from what I see, there is a gulf between these two scenarios:</p><p>A: The class is dominated by questioning where the teacher engages primarily with students who volunteer with hands up or by simply calling out. It’s the norm. It can seem lively on the surface but nearly always it’s just a few students who dominate while others are marginal; passive; silent. They might be thinking; they might not be. It’s possible to think nothing and say nothing and nobody will notice. Usually this goes along with questions of the type:&nbsp;<em>Can anyone tell me…..? Can anyone remember….? Who knows…..? Does everyone understand ….? Who has an answer for… ?&nbsp;</em>Some students usually have answers – so others just don’t have to. Thinking is optional. Some students’ default is just to wait for someone else to answer – because they always do.</p><p>B: The class where the teacher nearly always selects who should respond next by name. No hands up; no calling out – it could be anyone. This is the norm. Students all anticipate being asked to respond, sharing their thoughts; everyone mentally prepares an answer to every question in readiness for being selected. They are all involved. Nobody dominates. Over time, everyone contributes. Questions are addressed to the whole class followed by a pause and then….&nbsp;<em>Michael, what were you thinking? Safia, what answer did you get? Shafiq, how did you explain it?&nbsp;</em>Thinking is required from everyone; everyone is included.</p><p>Scenario A is very common but why would you accept this when you could generate Scenario B?</p><p>This is the power of&nbsp;<strong>cold calling</strong>, when the teacher chooses who to respond and it could be anyone. It’s a strategy named and promoted strongly by Doug Lemov in Teach Like A Champion and features prominently in our WalkThrus materials were our five step process looks like this:</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png?w=1024\" height=\"331\" width=\"1024\"></a></p><p>An example might run like this:</p><ul><li><strong>Ask the question</strong>:&nbsp;<em>Ok, everyone let’s see. What’s a good way to work out 12 x 17?</em></li><li><strong>Give thinking time</strong>: (No hands up, no calling out; scan the room as they think, keeping the focus)</li><li><strong>Select someone to respond:</strong>&nbsp;<em>Right, so Kelly what were you thinking? (warm, invitational). “I think it’s 204.”</em></li><li><strong>Respond to the answers.</strong>&nbsp;<em>Yes, that’s the right answer. What was your method? “I did 10 x 17 and then 2 x 17 and added them up”</em></li><li><strong>Select and another student:</strong>&nbsp;<em>Great. And Abdi what about you. What method did you use? “I did 10 x 12 makes 120 7 x 12 is 84 and then add them for 204”</em>.&nbsp;<em>Well done – how does that compare to Kelly’s answer?</em></li></ul><p>In the cold call scenario, Kelly and Abdi anticipate being asked; they think and engage; it’s the norm. It’s safe, friendly, supportive and inclusive. If they were wrong or unsure, the teacher finds out and can respond, offering appropriate support or instruction. The Scenario A experience could be very different. The teacher asks:&nbsp;<em>Does anyone know 12 x 17?</em>&nbsp;Michael knows. He puts his hand up. He’s correct. The teacher thanks him and moves on. Kelly and Abdi had barely registered the question, let alone thought of an answer. This happens all the time so they don’t even expect to give an answer when questions are asked.</p><h4><strong>WHAT’S THE KEY TO COLD-CALLING WORKING SO WELL?</strong></h4><p><strong>The spirit is inclusive and invitational; it’s never a ‘gotcha’:</strong>&nbsp;The absolute key is that students do not feel caught out or exposed. It’s the opposite. Asking students to answer is a warm invitation to participate.&nbsp;<em>David, what were you thinking? Yusuf, did you have an answer? Yasmin, which three did you pick?</em></p><p><strong>Everyone’s contributions matter.&nbsp;</strong>The teacher conspicuously always reaches into the corners of the class; there are no no-go areas; no silent tables. The message is simple and explicit.&nbsp;<em>I need to know what you are thinking if I’m going to help you the best I can. And you all matter to me. All of you, no exceptions.</em></p><p><strong>Accountability and inclusion go hand in hand:</strong>&nbsp;The routine use of cold call establishes the students’ mental habit – the norm – that when a question is asked, they need to listen, engage and think. The teacher will ask people they choose; they always do. It’s not a big deal; it happens all the time. The effect is that students always feel involved; they can’t opt out. That routine level of accountability helps them to focus their attention and also communicates a sense that they belong; they are included; they matter.</p><p><strong>Everyone is made to think:</strong>&nbsp;(or at least – it makes more students think, more of the time)</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png?w=1024\" height=\"202\" width=\"376\"></a></p><p>As we know from Willingham, ‘memory is the residue of thought’. If students don’t think, they can’t learn. Cold calling as a routine is the most effective way to maximise thinking during dynamic, responsive question and answer exchanges.&nbsp;<em>I’m not asking you to think if you feel like it …. I’m creating the conditions where you are more likely to think because you know I may ask you to give an answer. (And that’s good because if you’re struggling, I’ll find that out and can then help you.)</em></p><p><strong>The responses are responsive:&nbsp;</strong>A key element to cold calling is that you engage with the answers. You are checking for understanding. If they are right, you probe further; if they are wrong or unsure, you offer support; if they could improve the quality of response, you can give them another go to say it again, better. This deepens their thinking and improves your knowledge of them as learners.</p><h4>PART OF A WIDER QUESTIONING REPERTOIRE</h4><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png?w=831\" height=\"357\" width=\"611\"></a></p><p>Cold calling should be the default questioning mode – but it doesn’t stand alone. In fact, it works better if students understand its role in a wider matrix of questioning modes. If we talk in pairs with our talk partners, we can all air our ideas and rehearse our explanations; we do it more intensively knowing that the teacher will then cold call us, not ask for volunteers.&nbsp;<em>Michael, what were you and Alicia saying in your pair?</em></p><h4>COLD CALL ADAPTATIONS FOR CONFIDENCE-BUILDING</h4><p>There are lots of strategies you can use to ensure students build confidence in giving verbal answers in front of others. The Uncommon Schools team model a lot of these in their&nbsp;<a href=\"https://teacherhead.com/2021/01/21/principles-for-remote-instruction-notes-from-a-tlac-masterclass/\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\">remote learning webinars.</a></p><p><strong>Pre-Call</strong>: This is when you tell one or more students that you will ask them to respond after you’ve given an explanation, read a passage or watched a video.&nbsp;<em>Ok, John and Sabrina, after the video, I’d like you to summarise the key points for us.</em>&nbsp;This gives them that extra bit of notice to prepare. Other students know they too could be cold called afterwards but John and Sabrina get some prep time.</p><p><strong>Batched Cold-Call</strong>: This is another Uncommon Schools gem, when you tee up a number of students to answer in one go.&nbsp;<em>Right, now I’ve explained my examples, I’d love to hear your versions. I’ll start with Michael, then Daisy, then Samuel.</em>&nbsp;You then ask them one by one. It gives Michael and especially Daisy and Samuel a heads up. They can get ready. Any sense of ‘gotcha’ is removed entirely. It also helps the teacher plan to spread questions. It’s a technique a good committee chair will use – and works a dream in lessons.</p><p><strong>Rehearse and Affirm</strong>: This is where, first, you have given all students an opportunity to share their answers non-verbally through a means you can see: whiteboards (Show me!); in the chat stream on a remote call; on their books as you circulate in a classroom; on a quizzing application or form where you see individual answers. You select answers that are correct or interesting and then cold call the students to ask them to expand.&nbsp;<em>Robyn, what a great answer. Could you explain how you came to that conclusion? Jason, well done, B is the correct answer. How did you know that?</em></p><p>This technique has the effect of giving Robyn and Jason confidence in their understanding before they give their answer publicly. They already know they are right. It’s a technique that is great for the less confident students; you build them up by asking them to explain their good ideas or correct answers you’ve already seen – rather than them feeling it’s a risk offering answers at the point when they are still unsure.</p><h4>COLD-CALL FAQS</h4><p><strong>1. What about students who are shy/reluctant/awkward/have speech difficulties?&nbsp;</strong>My main response to this is to make it clear that our objective has to be to lead students to a place where they are no longer shy and reluctant. That means we don’t simply leave them out or not cold call at all. How will they ever develop the confidence and everyday resilience needed if we don’t involve them? We need a strategy to bring them in, step by step. This can be a combination of using pair share more often and then sharing their answers for them – to show them that they’ve got good ideas. It can be more use of ‘rehearse and affirm’ – checking their answers first before they share them. Build them up; don’t catch them out.</p><p><strong>2. Is it possible when hands up is such an ingrained habit?&nbsp;</strong>Yes of course. You need to make a deliberate, definite and sustained effort to change the culture, re-establishing expectations, rehearsing routines and keeping at it. No hands up; no calling out. It means addressing students who don’t follow the expectations. Normally it’s as much about the teacher changing their habits as the students changing theirs. Do it consciously – reminding yourself that unless you cold calling, lots of children learn not to think very hard.</p><p><strong>3. What if students are wrong?</strong>&nbsp;This is something you can anticipate and prepare. It helps to have some scripts that help you create that culture where error and uncertainty are normalised.</p><ul><li><em>That’s a good effort James but not quite right. Let’s try again… what was your first step?</em></li><li><em>I can see what you’re thinking Maya but that’s a different question. Let’s look at it again together…</em></li><li><em>No, you’re not there yet but tell me what you were thinking?</em></li></ul><p>The way a teacher handles error and uncertainty has a huge bearing on students’ willingness to contribute when they are uncertain. Make it normal, low key, unremarkable and focus on the reframing their thinking towards securing understanding. Consolidate, rehearse, use repetition – build confidence.</p><p><strong>4. Doesn’t it slow lessons down?&nbsp;</strong>I’m often asked this but my response is this: Do you want to know if students are struggling? Do you want them all thinking? Yes! The most efficient way to do that is to embed cold calling. If you flush out error and uncertainty during the instructional phase it allows you to re-teach there and then – which is a lot more efficient than waiting for weeks to pass only to discover later. It may feel like you are taking time but this is an investment in deeper understanding for everyone. The illusion given by a few students volunteering good answers, allowing you to zip through the material, risks masking all kinds of misconceptions and uncertainties. It always pays to cold call instead of accepting volunteers.</p><p><strong>5. What if someone has an idea to share?</strong>&nbsp;Of course, cold calling is for when the teacher is asking a question that everyone should think about. However, if students have spontaneous questions or ideas, or if you want to know whether anyone has had a particular experience (<em>has anyone read Catch 22?</em>) you need a process for that and, here, hands up is a good method.&nbsp;<strong><em>Hands up to ask</em></strong>.&nbsp;<em>Michael, thanks for putting your hand up, what’s your question?&nbsp;</em>This is different to when I’m asking everyone to consider a particular question… I need Michael’s hand down so I can cold call.</p><p><strong>6. Is this the same as using lollipop sticks?&nbsp;</strong>No. It’s different in important ways. Randomising who answers does reinforce the idea that everyone should prepare to answer – so it can break the habit of hands up and calling out. However, it removes the interpersonal investment a teacher has in the students. It doesn’t have the same sense of ‘<em>Alice, I’d love to hear your thoughts, because I value your contribution</em>‘. It’s explicitly neutral; functional. The lollistick pot has decided! That has some value and can work alongside cold calling – but is not quite as good or as responsive.</p><h4>REMOTE LEARNING</h4><p>The value of cold calling is more evident than ever in remote learning during live on-screen lessons. Remote learning magnifies many of the issues that are present in a live classroom and possibly provides an opportunity to create some new habits.</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png?w=1024\" height=\"360\" width=\"551\"></a></p><p>Calling out and volunteering is difficult through the technology, so it’s very powerful to use lots of names in cold calling where students are on camera.&nbsp;<em>Michael, what were you thinking? Safia, what did you put for number 6?&nbsp;</em>It’s so important for students to feel that their teachers notice their presence and cold calling has that effect as well as supporting the checking for understanding and thinking. Of course there is the chat stream too and that often allows for some neat combinations.</p><p><em>I’d like everyone to find a simile the poet uses in the first stanza… Prepare the answer but don’t send. 3,2,1, and send.&nbsp;</em>Then we cold call.&nbsp;<em>Safia, let’s hear you explain your choice?&nbsp;Michael – camera trouble? OK, just explain your answer in the chat, thank you.</em></p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png?w=1024\" height=\"318\" width=\"551\"></a></p><p>The ability to choose answers from the screen or from the chat is very powerful. The expectation that you could choose anyone – in a batched call, a pre-call or a straight cold call – keeps the focus; it folds people into the lesson, feeling they matter. It’s just incredibly powerful; a world away from the opposite where students can volunteer to engage and answer or, volunteer to disengage and say nothing.</p>', 1, 'TOM SHERRINGTON', 'public/blog/icon/5WDAvnlQRBF0Y1WeKcKGOHy1BaU8ja5zXQNjT1SM.png', 'public/blog/banner_image/4euOfR36q5uwQUJkUoVJFBYEYTcpjEUyAaMqOpbz.png', 'If you’re not yet cold calling as a matter of routine… maybe now is the time to get practising. Make a habit of it.', 'Education, Cold Caling, Methods, Teaching', 10, 0, '2024-06-14 09:51:35', '2024-06-14 09:51:35'),
(2, 'The #1 strategy for inclusive classrooms – remote and in person.', 'Based on my experience working with hundreds of teachers in numerous contexts, I’d suggest that one of the strategies with the biggest impact on the overall effectiveness of lessons is the routine use of cold-call questioning. More and more I find that, rather than merely promoting it, I am strongly advocating it, basically saying: every teacher should use cold calling as their default questioning mode. I feel strongly about it.', '<p>Why? Because, from what I see, there is a gulf between these two scenarios:</p><p>A: The class is dominated by questioning where the teacher engages primarily with students who volunteer with hands up or by simply calling out. It’s the norm. It can seem lively on the surface but nearly always it’s just a few students who dominate while others are marginal; passive; silent. They might be thinking; they might not be. It’s possible to think nothing and say nothing and nobody will notice. Usually this goes along with questions of the type:&nbsp;<em>Can anyone tell me…..? Can anyone remember….? Who knows…..? Does everyone understand ….? Who has an answer for… ?&nbsp;</em>Some students usually have answers – so others just don’t have to. Thinking is optional. Some students’ default is just to wait for someone else to answer – because they always do.</p><p>B: The class where the teacher nearly always selects who should respond next by name. No hands up; no calling out – it could be anyone. This is the norm. Students all anticipate being asked to respond, sharing their thoughts; everyone mentally prepares an answer to every question in readiness for being selected. They are all involved. Nobody dominates. Over time, everyone contributes. Questions are addressed to the whole class followed by a pause and then….&nbsp;<em>Michael, what were you thinking? Safia, what answer did you get? Shafiq, how did you explain it?&nbsp;</em>Thinking is required from everyone; everyone is included.</p><p>Scenario A is very common but why would you accept this when you could generate Scenario B?</p><p>This is the power of&nbsp;<strong>cold calling</strong>, when the teacher chooses who to respond and it could be anyone. It’s a strategy named and promoted strongly by Doug Lemov in Teach Like A Champion and features prominently in our WalkThrus materials were our five step process looks like this:</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png?w=1024\" height=\"331\" width=\"1024\"></a></p><p>An example might run like this:</p><ul><li><strong>Ask the question</strong>:&nbsp;<em>Ok, everyone let’s see. What’s a good way to work out 12 x 17?</em></li><li><strong>Give thinking time</strong>: (No hands up, no calling out; scan the room as they think, keeping the focus)</li><li><strong>Select someone to respond:</strong>&nbsp;<em>Right, so Kelly what were you thinking? (warm, invitational). “I think it’s 204.”</em></li><li><strong>Respond to the answers.</strong>&nbsp;<em>Yes, that’s the right answer. What was your method? “I did 10 x 17 and then 2 x 17 and added them up”</em></li><li><strong>Select and another student:</strong>&nbsp;<em>Great. And Abdi what about you. What method did you use? “I did 10 x 12 makes 120 7 x 12 is 84 and then add them for 204”</em>.&nbsp;<em>Well done – how does that compare to Kelly’s answer?</em></li></ul><p>In the cold call scenario, Kelly and Abdi anticipate being asked; they think and engage; it’s the norm. It’s safe, friendly, supportive and inclusive. If they were wrong or unsure, the teacher finds out and can respond, offering appropriate support or instruction. The Scenario A experience could be very different. The teacher asks:&nbsp;<em>Does anyone know 12 x 17?</em>&nbsp;Michael knows. He puts his hand up. He’s correct. The teacher thanks him and moves on. Kelly and Abdi had barely registered the question, let alone thought of an answer. This happens all the time so they don’t even expect to give an answer when questions are asked.</p><h4><strong>WHAT’S THE KEY TO COLD-CALLING WORKING SO WELL?</strong></h4><p><strong>The spirit is inclusive and invitational; it’s never a ‘gotcha’:</strong>&nbsp;The absolute key is that students do not feel caught out or exposed. It’s the opposite. Asking students to answer is a warm invitation to participate.&nbsp;<em>David, what were you thinking? Yusuf, did you have an answer? Yasmin, which three did you pick?</em></p><p><strong>Everyone’s contributions matter.&nbsp;</strong>The teacher conspicuously always reaches into the corners of the class; there are no no-go areas; no silent tables. The message is simple and explicit.&nbsp;<em>I need to know what you are thinking if I’m going to help you the best I can. And you all matter to me. All of you, no exceptions.</em></p><p><strong>Accountability and inclusion go hand in hand:</strong>&nbsp;The routine use of cold call establishes the students’ mental habit – the norm – that when a question is asked, they need to listen, engage and think. The teacher will ask people they choose; they always do. It’s not a big deal; it happens all the time. The effect is that students always feel involved; they can’t opt out. That routine level of accountability helps them to focus their attention and also communicates a sense that they belong; they are included; they matter.</p><p><strong>Everyone is made to think:</strong>&nbsp;(or at least – it makes more students think, more of the time)</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png?w=1024\" height=\"202\" width=\"376\"></a></p><p>As we know from Willingham, ‘memory is the residue of thought’. If students don’t think, they can’t learn. Cold calling as a routine is the most effective way to maximise thinking during dynamic, responsive question and answer exchanges.&nbsp;<em>I’m not asking you to think if you feel like it …. I’m creating the conditions where you are more likely to think because you know I may ask you to give an answer. (And that’s good because if you’re struggling, I’ll find that out and can then help you.)</em></p><p><strong>The responses are responsive:&nbsp;</strong>A key element to cold calling is that you engage with the answers. You are checking for understanding. If they are right, you probe further; if they are wrong or unsure, you offer support; if they could improve the quality of response, you can give them another go to say it again, better. This deepens their thinking and improves your knowledge of them as learners.</p><h4>PART OF A WIDER QUESTIONING REPERTOIRE</h4><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png?w=831\" height=\"357\" width=\"611\"></a></p><p>Cold calling should be the default questioning mode – but it doesn’t stand alone. In fact, it works better if students understand its role in a wider matrix of questioning modes. If we talk in pairs with our talk partners, we can all air our ideas and rehearse our explanations; we do it more intensively knowing that the teacher will then cold call us, not ask for volunteers.&nbsp;<em>Michael, what were you and Alicia saying in your pair?</em></p><h4>COLD CALL ADAPTATIONS FOR CONFIDENCE-BUILDING</h4><p>There are lots of strategies you can use to ensure students build confidence in giving verbal answers in front of others. The Uncommon Schools team model a lot of these in their&nbsp;<a href=\"https://teacherhead.com/2021/01/21/principles-for-remote-instruction-notes-from-a-tlac-masterclass/\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\">remote learning webinars.</a></p><p><strong>Pre-Call</strong>: This is when you tell one or more students that you will ask them to respond after you’ve given an explanation, read a passage or watched a video.&nbsp;<em>Ok, John and Sabrina, after the video, I’d like you to summarise the key points for us.</em>&nbsp;This gives them that extra bit of notice to prepare. Other students know they too could be cold called afterwards but John and Sabrina get some prep time.</p><p><strong>Batched Cold-Call</strong>: This is another Uncommon Schools gem, when you tee up a number of students to answer in one go.&nbsp;<em>Right, now I’ve explained my examples, I’d love to hear your versions. I’ll start with Michael, then Daisy, then Samuel.</em>&nbsp;You then ask them one by one. It gives Michael and especially Daisy and Samuel a heads up. They can get ready. Any sense of ‘gotcha’ is removed entirely. It also helps the teacher plan to spread questions. It’s a technique a good committee chair will use – and works a dream in lessons.</p><p><strong>Rehearse and Affirm</strong>: This is where, first, you have given all students an opportunity to share their answers non-verbally through a means you can see: whiteboards (Show me!); in the chat stream on a remote call; on their books as you circulate in a classroom; on a quizzing application or form where you see individual answers. You select answers that are correct or interesting and then cold call the students to ask them to expand.&nbsp;<em>Robyn, what a great answer. Could you explain how you came to that conclusion? Jason, well done, B is the correct answer. How did you know that?</em></p><p>This technique has the effect of giving Robyn and Jason confidence in their understanding before they give their answer publicly. They already know they are right. It’s a technique that is great for the less confident students; you build them up by asking them to explain their good ideas or correct answers you’ve already seen – rather than them feeling it’s a risk offering answers at the point when they are still unsure.</p><h4>COLD-CALL FAQS</h4><p><strong>1. What about students who are shy/reluctant/awkward/have speech difficulties?&nbsp;</strong>My main response to this is to make it clear that our objective has to be to lead students to a place where they are no longer shy and reluctant. That means we don’t simply leave them out or not cold call at all. How will they ever develop the confidence and everyday resilience needed if we don’t involve them? We need a strategy to bring them in, step by step. This can be a combination of using pair share more often and then sharing their answers for them – to show them that they’ve got good ideas. It can be more use of ‘rehearse and affirm’ – checking their answers first before they share them. Build them up; don’t catch them out.</p><p><strong>2. Is it possible when hands up is such an ingrained habit?&nbsp;</strong>Yes of course. You need to make a deliberate, definite and sustained effort to change the culture, re-establishing expectations, rehearsing routines and keeping at it. No hands up; no calling out. It means addressing students who don’t follow the expectations. Normally it’s as much about the teacher changing their habits as the students changing theirs. Do it consciously – reminding yourself that unless you cold calling, lots of children learn not to think very hard.</p><p><strong>3. What if students are wrong?</strong>&nbsp;This is something you can anticipate and prepare. It helps to have some scripts that help you create that culture where error and uncertainty are normalised.</p><ul><li><em>That’s a good effort James but not quite right. Let’s try again… what was your first step?</em></li><li><em>I can see what you’re thinking Maya but that’s a different question. Let’s look at it again together…</em></li><li><em>No, you’re not there yet but tell me what you were thinking?</em></li></ul><p>The way a teacher handles error and uncertainty has a huge bearing on students’ willingness to contribute when they are uncertain. Make it normal, low key, unremarkable and focus on the reframing their thinking towards securing understanding. Consolidate, rehearse, use repetition – build confidence.</p><p><strong>4. Doesn’t it slow lessons down?&nbsp;</strong>I’m often asked this but my response is this: Do you want to know if students are struggling? Do you want them all thinking? Yes! The most efficient way to do that is to embed cold calling. If you flush out error and uncertainty during the instructional phase it allows you to re-teach there and then – which is a lot more efficient than waiting for weeks to pass only to discover later. It may feel like you are taking time but this is an investment in deeper understanding for everyone. The illusion given by a few students volunteering good answers, allowing you to zip through the material, risks masking all kinds of misconceptions and uncertainties. It always pays to cold call instead of accepting volunteers.</p><p><strong>5. What if someone has an idea to share?</strong>&nbsp;Of course, cold calling is for when the teacher is asking a question that everyone should think about. However, if students have spontaneous questions or ideas, or if you want to know whether anyone has had a particular experience (<em>has anyone read Catch 22?</em>) you need a process for that and, here, hands up is a good method.&nbsp;<strong><em>Hands up to ask</em></strong>.&nbsp;<em>Michael, thanks for putting your hand up, what’s your question?&nbsp;</em>This is different to when I’m asking everyone to consider a particular question… I need Michael’s hand down so I can cold call.</p><p><strong>6. Is this the same as using lollipop sticks?&nbsp;</strong>No. It’s different in important ways. Randomising who answers does reinforce the idea that everyone should prepare to answer – so it can break the habit of hands up and calling out. However, it removes the interpersonal investment a teacher has in the students. It doesn’t have the same sense of ‘<em>Alice, I’d love to hear your thoughts, because I value your contribution</em>‘. It’s explicitly neutral; functional. The lollistick pot has decided! That has some value and can work alongside cold calling – but is not quite as good or as responsive.</p><h4>REMOTE LEARNING</h4><p>The value of cold calling is more evident than ever in remote learning during live on-screen lessons. Remote learning magnifies many of the issues that are present in a live classroom and possibly provides an opportunity to create some new habits.</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png?w=1024\" height=\"360\" width=\"551\"></a></p><p>Calling out and volunteering is difficult through the technology, so it’s very powerful to use lots of names in cold calling where students are on camera.&nbsp;<em>Michael, what were you thinking? Safia, what did you put for number 6?&nbsp;</em>It’s so important for students to feel that their teachers notice their presence and cold calling has that effect as well as supporting the checking for understanding and thinking. Of course there is the chat stream too and that often allows for some neat combinations.</p><p><em>I’d like everyone to find a simile the poet uses in the first stanza… Prepare the answer but don’t send. 3,2,1, and send.&nbsp;</em>Then we cold call.&nbsp;<em>Safia, let’s hear you explain your choice?&nbsp;Michael – camera trouble? OK, just explain your answer in the chat, thank you.</em></p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png?w=1024\" height=\"318\" width=\"551\"></a></p><p>The ability to choose answers from the screen or from the chat is very powerful. The expectation that you could choose anyone – in a batched call, a pre-call or a straight cold call – keeps the focus; it folds people into the lesson, feeling they matter. It’s just incredibly powerful; a world away from the opposite where students can volunteer to engage and answer or, volunteer to disengage and say nothing.</p>', 1, 'TOM SHERRINGTON', 'public/blog/icon/fESM98IEsJGh6t6xwDQTa8Wm6DV0I8dbRV1yf5rM.png', 'public/blog/banner_image/24P4FyE6q9HMCGzu0x6EMjfHTPL0I9WF9WDCi2S6.png', 'If you’re not yet cold calling as a matter of routine… maybe now is the time to get practising. Make a habit of it.', 'Education, Cold Caling, Methods, Teaching', 1, 0, '2024-06-14 09:51:58', '2024-06-14 09:51:58');
INSERT INTO `blogs` (`id`, `title`, `subtitle`, `content`, `category_id`, `author_name`, `icon`, `banner`, `quote`, `tags`, `visit`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'The #1 strategy for inclusive classrooms', 'Based on my experience working with hundreds of teachers in numerous contexts, I’d suggest that one of the strategies with the biggest impact on the overall effectiveness of lessons is the routine use of cold-call questioning. More and more I find that, rather than merely promoting it, I am strongly advocating it, basically saying: every teacher should use cold calling as their default questioning mode. I feel strongly about it.', '<p>Why? Because, from what I see, there is a gulf between these two scenarios:</p><p>A: The class is dominated by questioning where the teacher engages primarily with students who volunteer with hands up or by simply calling out. It’s the norm. It can seem lively on the surface but nearly always it’s just a few students who dominate while others are marginal; passive; silent. They might be thinking; they might not be. It’s possible to think nothing and say nothing and nobody will notice. Usually this goes along with questions of the type:&nbsp;<em>Can anyone tell me…..? Can anyone remember….? Who knows…..? Does everyone understand ….? Who has an answer for… ?&nbsp;</em>Some students usually have answers – so others just don’t have to. Thinking is optional. Some students’ default is just to wait for someone else to answer – because they always do.</p><p>B: The class where the teacher nearly always selects who should respond next by name. No hands up; no calling out – it could be anyone. This is the norm. Students all anticipate being asked to respond, sharing their thoughts; everyone mentally prepares an answer to every question in readiness for being selected. They are all involved. Nobody dominates. Over time, everyone contributes. Questions are addressed to the whole class followed by a pause and then….&nbsp;<em>Michael, what were you thinking? Safia, what answer did you get? Shafiq, how did you explain it?&nbsp;</em>Thinking is required from everyone; everyone is included.</p><p>Scenario A is very common but why would you accept this when you could generate Scenario B?</p><p>This is the power of&nbsp;<strong>cold calling</strong>, when the teacher chooses who to respond and it could be anyone. It’s a strategy named and promoted strongly by Doug Lemov in Teach Like A Champion and features prominently in our WalkThrus materials were our five step process looks like this:</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png?w=1024\" height=\"331\" width=\"1024\"></a></p><p>An example might run like this:</p><ul><li><strong>Ask the question</strong>:&nbsp;<em>Ok, everyone let’s see. What’s a good way to work out 12 x 17?</em></li><li><strong>Give thinking time</strong>: (No hands up, no calling out; scan the room as they think, keeping the focus)</li><li><strong>Select someone to respond:</strong>&nbsp;<em>Right, so Kelly what were you thinking? (warm, invitational). “I think it’s 204.”</em></li><li><strong>Respond to the answers.</strong>&nbsp;<em>Yes, that’s the right answer. What was your method? “I did 10 x 17 and then 2 x 17 and added them up”</em></li><li><strong>Select and another student:</strong>&nbsp;<em>Great. And Abdi what about you. What method did you use? “I did 10 x 12 makes 120 7 x 12 is 84 and then add them for 204”</em>.&nbsp;<em>Well done – how does that compare to Kelly’s answer?</em></li></ul><p>In the cold call scenario, Kelly and Abdi anticipate being asked; they think and engage; it’s the norm. It’s safe, friendly, supportive and inclusive. If they were wrong or unsure, the teacher finds out and can respond, offering appropriate support or instruction. The Scenario A experience could be very different. The teacher asks:&nbsp;<em>Does anyone know 12 x 17?</em>&nbsp;Michael knows. He puts his hand up. He’s correct. The teacher thanks him and moves on. Kelly and Abdi had barely registered the question, let alone thought of an answer. This happens all the time so they don’t even expect to give an answer when questions are asked.</p><h4><strong>WHAT’S THE KEY TO COLD-CALLING WORKING SO WELL?</strong></h4><p><strong>The spirit is inclusive and invitational; it’s never a ‘gotcha’:</strong>&nbsp;The absolute key is that students do not feel caught out or exposed. It’s the opposite. Asking students to answer is a warm invitation to participate.&nbsp;<em>David, what were you thinking? Yusuf, did you have an answer? Yasmin, which three did you pick?</em></p><p><strong>Everyone’s contributions matter.&nbsp;</strong>The teacher conspicuously always reaches into the corners of the class; there are no no-go areas; no silent tables. The message is simple and explicit.&nbsp;<em>I need to know what you are thinking if I’m going to help you the best I can. And you all matter to me. All of you, no exceptions.</em></p><p><strong>Accountability and inclusion go hand in hand:</strong>&nbsp;The routine use of cold call establishes the students’ mental habit – the norm – that when a question is asked, they need to listen, engage and think. The teacher will ask people they choose; they always do. It’s not a big deal; it happens all the time. The effect is that students always feel involved; they can’t opt out. That routine level of accountability helps them to focus their attention and also communicates a sense that they belong; they are included; they matter.</p><p><strong>Everyone is made to think:</strong>&nbsp;(or at least – it makes more students think, more of the time)</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png?w=1024\" height=\"202\" width=\"376\"></a></p><p>As we know from Willingham, ‘memory is the residue of thought’. If students don’t think, they can’t learn. Cold calling as a routine is the most effective way to maximise thinking during dynamic, responsive question and answer exchanges.&nbsp;<em>I’m not asking you to think if you feel like it …. I’m creating the conditions where you are more likely to think because you know I may ask you to give an answer. (And that’s good because if you’re struggling, I’ll find that out and can then help you.)</em></p><p><strong>The responses are responsive:&nbsp;</strong>A key element to cold calling is that you engage with the answers. You are checking for understanding. If they are right, you probe further; if they are wrong or unsure, you offer support; if they could improve the quality of response, you can give them another go to say it again, better. This deepens their thinking and improves your knowledge of them as learners.</p><h4>PART OF A WIDER QUESTIONING REPERTOIRE</h4><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png?w=831\" height=\"357\" width=\"611\"></a></p><p>Cold calling should be the default questioning mode – but it doesn’t stand alone. In fact, it works better if students understand its role in a wider matrix of questioning modes. If we talk in pairs with our talk partners, we can all air our ideas and rehearse our explanations; we do it more intensively knowing that the teacher will then cold call us, not ask for volunteers.&nbsp;<em>Michael, what were you and Alicia saying in your pair?</em></p><h4>COLD CALL ADAPTATIONS FOR CONFIDENCE-BUILDING</h4><p>There are lots of strategies you can use to ensure students build confidence in giving verbal answers in front of others. The Uncommon Schools team model a lot of these in their&nbsp;<a href=\"https://teacherhead.com/2021/01/21/principles-for-remote-instruction-notes-from-a-tlac-masterclass/\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\">remote learning webinars.</a></p><p><strong>Pre-Call</strong>: This is when you tell one or more students that you will ask them to respond after you’ve given an explanation, read a passage or watched a video.&nbsp;<em>Ok, John and Sabrina, after the video, I’d like you to summarise the key points for us.</em>&nbsp;This gives them that extra bit of notice to prepare. Other students know they too could be cold called afterwards but John and Sabrina get some prep time.</p><p><strong>Batched Cold-Call</strong>: This is another Uncommon Schools gem, when you tee up a number of students to answer in one go.&nbsp;<em>Right, now I’ve explained my examples, I’d love to hear your versions. I’ll start with Michael, then Daisy, then Samuel.</em>&nbsp;You then ask them one by one. It gives Michael and especially Daisy and Samuel a heads up. They can get ready. Any sense of ‘gotcha’ is removed entirely. It also helps the teacher plan to spread questions. It’s a technique a good committee chair will use – and works a dream in lessons.</p><p><strong>Rehearse and Affirm</strong>: This is where, first, you have given all students an opportunity to share their answers non-verbally through a means you can see: whiteboards (Show me!); in the chat stream on a remote call; on their books as you circulate in a classroom; on a quizzing application or form where you see individual answers. You select answers that are correct or interesting and then cold call the students to ask them to expand.&nbsp;<em>Robyn, what a great answer. Could you explain how you came to that conclusion? Jason, well done, B is the correct answer. How did you know that?</em></p><p>This technique has the effect of giving Robyn and Jason confidence in their understanding before they give their answer publicly. They already know they are right. It’s a technique that is great for the less confident students; you build them up by asking them to explain their good ideas or correct answers you’ve already seen – rather than them feeling it’s a risk offering answers at the point when they are still unsure.</p><h4>COLD-CALL FAQS</h4><p><strong>1. What about students who are shy/reluctant/awkward/have speech difficulties?&nbsp;</strong>My main response to this is to make it clear that our objective has to be to lead students to a place where they are no longer shy and reluctant. That means we don’t simply leave them out or not cold call at all. How will they ever develop the confidence and everyday resilience needed if we don’t involve them? We need a strategy to bring them in, step by step. This can be a combination of using pair share more often and then sharing their answers for them – to show them that they’ve got good ideas. It can be more use of ‘rehearse and affirm’ – checking their answers first before they share them. Build them up; don’t catch them out.</p><p><strong>2. Is it possible when hands up is such an ingrained habit?&nbsp;</strong>Yes of course. You need to make a deliberate, definite and sustained effort to change the culture, re-establishing expectations, rehearsing routines and keeping at it. No hands up; no calling out. It means addressing students who don’t follow the expectations. Normally it’s as much about the teacher changing their habits as the students changing theirs. Do it consciously – reminding yourself that unless you cold calling, lots of children learn not to think very hard.</p><p><strong>3. What if students are wrong?</strong>&nbsp;This is something you can anticipate and prepare. It helps to have some scripts that help you create that culture where error and uncertainty are normalised.</p><ul><li><em>That’s a good effort James but not quite right. Let’s try again… what was your first step?</em></li><li><em>I can see what you’re thinking Maya but that’s a different question. Let’s look at it again together…</em></li><li><em>No, you’re not there yet but tell me what you were thinking?</em></li></ul><p>The way a teacher handles error and uncertainty has a huge bearing on students’ willingness to contribute when they are uncertain. Make it normal, low key, unremarkable and focus on the reframing their thinking towards securing understanding. Consolidate, rehearse, use repetition – build confidence.</p><p><strong>4. Doesn’t it slow lessons down?&nbsp;</strong>I’m often asked this but my response is this: Do you want to know if students are struggling? Do you want them all thinking? Yes! The most efficient way to do that is to embed cold calling. If you flush out error and uncertainty during the instructional phase it allows you to re-teach there and then – which is a lot more efficient than waiting for weeks to pass only to discover later. It may feel like you are taking time but this is an investment in deeper understanding for everyone. The illusion given by a few students volunteering good answers, allowing you to zip through the material, risks masking all kinds of misconceptions and uncertainties. It always pays to cold call instead of accepting volunteers.</p><p><strong>5. What if someone has an idea to share?</strong>&nbsp;Of course, cold calling is for when the teacher is asking a question that everyone should think about. However, if students have spontaneous questions or ideas, or if you want to know whether anyone has had a particular experience (<em>has anyone read Catch 22?</em>) you need a process for that and, here, hands up is a good method.&nbsp;<strong><em>Hands up to ask</em></strong>.&nbsp;<em>Michael, thanks for putting your hand up, what’s your question?&nbsp;</em>This is different to when I’m asking everyone to consider a particular question… I need Michael’s hand down so I can cold call.</p><p><strong>6. Is this the same as using lollipop sticks?&nbsp;</strong>No. It’s different in important ways. Randomising who answers does reinforce the idea that everyone should prepare to answer – so it can break the habit of hands up and calling out. However, it removes the interpersonal investment a teacher has in the students. It doesn’t have the same sense of ‘<em>Alice, I’d love to hear your thoughts, because I value your contribution</em>‘. It’s explicitly neutral; functional. The lollistick pot has decided! That has some value and can work alongside cold calling – but is not quite as good or as responsive.</p><h4>REMOTE LEARNING</h4><p>The value of cold calling is more evident than ever in remote learning during live on-screen lessons. Remote learning magnifies many of the issues that are present in a live classroom and possibly provides an opportunity to create some new habits.</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png?w=1024\" height=\"360\" width=\"551\"></a></p><p>Calling out and volunteering is difficult through the technology, so it’s very powerful to use lots of names in cold calling where students are on camera.&nbsp;<em>Michael, what were you thinking? Safia, what did you put for number 6?&nbsp;</em>It’s so important for students to feel that their teachers notice their presence and cold calling has that effect as well as supporting the checking for understanding and thinking. Of course there is the chat stream too and that often allows for some neat combinations.</p><p><em>I’d like everyone to find a simile the poet uses in the first stanza… Prepare the answer but don’t send. 3,2,1, and send.&nbsp;</em>Then we cold call.&nbsp;<em>Safia, let’s hear you explain your choice?&nbsp;Michael – camera trouble? OK, just explain your answer in the chat, thank you.</em></p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png?w=1024\" height=\"318\" width=\"551\"></a></p><p>The ability to choose answers from the screen or from the chat is very powerful. The expectation that you could choose anyone – in a batched call, a pre-call or a straight cold call – keeps the focus; it folds people into the lesson, feeling they matter. It’s just incredibly powerful; a world away from the opposite where students can volunteer to engage and answer or, volunteer to disengage and say nothing.</p>', 2, 'TOM SHERRINGTON', 'public/blog/icon/7CiKRpVbQ0ggrX6oO1Z0SrdE1qXfl03TvO0CNFeC.png', 'public/blog/banner_image/qpRxT03YCxKa1tM3olP8mxgOfcw0RRdaCm33p4Ar.png', 'If you’re not yet cold calling as a matter of routine… maybe now is the time to get practising. Make a habit of it.', 'Education, Cold Caling, Methods, Teaching', 1, 0, '2024-06-14 09:52:08', '2024-07-12 19:19:26'),
(4, 'The 1 strategy for inclusive classrooms – remote and in person.', 'Based on my experience working with hundreds of teachers in numerous contexts, I’d suggest that one of the strategies with the biggest impact on the overall effectiveness of lessons is the routine use of cold-call questioning. More and more I find that, rather than merely promoting it, I am strongly advocating it, basically saying: every teacher should use cold calling as their default questioning mode. I feel strongly about it.', '<p>Why? Because, from what I see, there is a gulf between these two scenarios:</p><p>A: The class is dominated by questioning where the teacher engages primarily with students who volunteer with hands up or by simply calling out. It’s the norm. It can seem lively on the surface but nearly always it’s just a few students who dominate while others are marginal; passive; silent. They might be thinking; they might not be. It’s possible to think nothing and say nothing and nobody will notice. Usually this goes along with questions of the type:&nbsp;<em>Can anyone tell me…..? Can anyone remember….? Who knows…..? Does everyone understand ….? Who has an answer for… ?&nbsp;</em>Some students usually have answers – so others just don’t have to. Thinking is optional. Some students’ default is just to wait for someone else to answer – because they always do.</p><p>B: The class where the teacher nearly always selects who should respond next by name. No hands up; no calling out – it could be anyone. This is the norm. Students all anticipate being asked to respond, sharing their thoughts; everyone mentally prepares an answer to every question in readiness for being selected. They are all involved. Nobody dominates. Over time, everyone contributes. Questions are addressed to the whole class followed by a pause and then….&nbsp;<em>Michael, what were you thinking? Safia, what answer did you get? Shafiq, how did you explain it?&nbsp;</em>Thinking is required from everyone; everyone is included.</p><p>Scenario A is very common but why would you accept this when you could generate Scenario B?</p><p>This is the power of&nbsp;<strong>cold calling</strong>, when the teacher chooses who to respond and it could be anyone. It’s a strategy named and promoted strongly by Doug Lemov in Teach Like A Champion and features prominently in our WalkThrus materials were our five step process looks like this:</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.18.56.png?w=1024\" height=\"331\" width=\"1024\"></a></p><p>An example might run like this:</p><ul><li><strong>Ask the question</strong>:&nbsp;<em>Ok, everyone let’s see. What’s a good way to work out 12 x 17?</em></li><li><strong>Give thinking time</strong>: (No hands up, no calling out; scan the room as they think, keeping the focus)</li><li><strong>Select someone to respond:</strong>&nbsp;<em>Right, so Kelly what were you thinking? (warm, invitational). “I think it’s 204.”</em></li><li><strong>Respond to the answers.</strong>&nbsp;<em>Yes, that’s the right answer. What was your method? “I did 10 x 17 and then 2 x 17 and added them up”</em></li><li><strong>Select and another student:</strong>&nbsp;<em>Great. And Abdi what about you. What method did you use? “I did 10 x 12 makes 120 7 x 12 is 84 and then add them for 204”</em>.&nbsp;<em>Well done – how does that compare to Kelly’s answer?</em></li></ul><p>In the cold call scenario, Kelly and Abdi anticipate being asked; they think and engage; it’s the norm. It’s safe, friendly, supportive and inclusive. If they were wrong or unsure, the teacher finds out and can respond, offering appropriate support or instruction. The Scenario A experience could be very different. The teacher asks:&nbsp;<em>Does anyone know 12 x 17?</em>&nbsp;Michael knows. He puts his hand up. He’s correct. The teacher thanks him and moves on. Kelly and Abdi had barely registered the question, let alone thought of an answer. This happens all the time so they don’t even expect to give an answer when questions are asked.</p><h4><strong>WHAT’S THE KEY TO COLD-CALLING WORKING SO WELL?</strong></h4><p><strong>The spirit is inclusive and invitational; it’s never a ‘gotcha’:</strong>&nbsp;The absolute key is that students do not feel caught out or exposed. It’s the opposite. Asking students to answer is a warm invitation to participate.&nbsp;<em>David, what were you thinking? Yusuf, did you have an answer? Yasmin, which three did you pick?</em></p><p><strong>Everyone’s contributions matter.&nbsp;</strong>The teacher conspicuously always reaches into the corners of the class; there are no no-go areas; no silent tables. The message is simple and explicit.&nbsp;<em>I need to know what you are thinking if I’m going to help you the best I can. And you all matter to me. All of you, no exceptions.</em></p><p><strong>Accountability and inclusion go hand in hand:</strong>&nbsp;The routine use of cold call establishes the students’ mental habit – the norm – that when a question is asked, they need to listen, engage and think. The teacher will ask people they choose; they always do. It’s not a big deal; it happens all the time. The effect is that students always feel involved; they can’t opt out. That routine level of accountability helps them to focus their attention and also communicates a sense that they belong; they are included; they matter.</p><p><strong>Everyone is made to think:</strong>&nbsp;(or at least – it makes more students think, more of the time)</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2020/10/screenshot-2020-10-17-at-18.58.04.png?w=1024\" height=\"202\" width=\"376\"></a></p><p>As we know from Willingham, ‘memory is the residue of thought’. If students don’t think, they can’t learn. Cold calling as a routine is the most effective way to maximise thinking during dynamic, responsive question and answer exchanges.&nbsp;<em>I’m not asking you to think if you feel like it …. I’m creating the conditions where you are more likely to think because you know I may ask you to give an answer. (And that’s good because if you’re struggling, I’ll find that out and can then help you.)</em></p><p><strong>The responses are responsive:&nbsp;</strong>A key element to cold calling is that you engage with the answers. You are checking for understanding. If they are right, you probe further; if they are wrong or unsure, you offer support; if they could improve the quality of response, you can give them another go to say it again, better. This deepens their thinking and improves your knowledge of them as learners.</p><h4>PART OF A WIDER QUESTIONING REPERTOIRE</h4><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screen-shot-2021-02-06-at-23.15.35.png?w=831\" height=\"357\" width=\"611\"></a></p><p>Cold calling should be the default questioning mode – but it doesn’t stand alone. In fact, it works better if students understand its role in a wider matrix of questioning modes. If we talk in pairs with our talk partners, we can all air our ideas and rehearse our explanations; we do it more intensively knowing that the teacher will then cold call us, not ask for volunteers.&nbsp;<em>Michael, what were you and Alicia saying in your pair?</em></p><h4>COLD CALL ADAPTATIONS FOR CONFIDENCE-BUILDING</h4><p>There are lots of strategies you can use to ensure students build confidence in giving verbal answers in front of others. The Uncommon Schools team model a lot of these in their&nbsp;<a href=\"https://teacherhead.com/2021/01/21/principles-for-remote-instruction-notes-from-a-tlac-masterclass/\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\">remote learning webinars.</a></p><p><strong>Pre-Call</strong>: This is when you tell one or more students that you will ask them to respond after you’ve given an explanation, read a passage or watched a video.&nbsp;<em>Ok, John and Sabrina, after the video, I’d like you to summarise the key points for us.</em>&nbsp;This gives them that extra bit of notice to prepare. Other students know they too could be cold called afterwards but John and Sabrina get some prep time.</p><p><strong>Batched Cold-Call</strong>: This is another Uncommon Schools gem, when you tee up a number of students to answer in one go.&nbsp;<em>Right, now I’ve explained my examples, I’d love to hear your versions. I’ll start with Michael, then Daisy, then Samuel.</em>&nbsp;You then ask them one by one. It gives Michael and especially Daisy and Samuel a heads up. They can get ready. Any sense of ‘gotcha’ is removed entirely. It also helps the teacher plan to spread questions. It’s a technique a good committee chair will use – and works a dream in lessons.</p><p><strong>Rehearse and Affirm</strong>: This is where, first, you have given all students an opportunity to share their answers non-verbally through a means you can see: whiteboards (Show me!); in the chat stream on a remote call; on their books as you circulate in a classroom; on a quizzing application or form where you see individual answers. You select answers that are correct or interesting and then cold call the students to ask them to expand.&nbsp;<em>Robyn, what a great answer. Could you explain how you came to that conclusion? Jason, well done, B is the correct answer. How did you know that?</em></p><p>This technique has the effect of giving Robyn and Jason confidence in their understanding before they give their answer publicly. They already know they are right. It’s a technique that is great for the less confident students; you build them up by asking them to explain their good ideas or correct answers you’ve already seen – rather than them feeling it’s a risk offering answers at the point when they are still unsure.</p><h4>COLD-CALL FAQS</h4><p><strong>1. What about students who are shy/reluctant/awkward/have speech difficulties?&nbsp;</strong>My main response to this is to make it clear that our objective has to be to lead students to a place where they are no longer shy and reluctant. That means we don’t simply leave them out or not cold call at all. How will they ever develop the confidence and everyday resilience needed if we don’t involve them? We need a strategy to bring them in, step by step. This can be a combination of using pair share more often and then sharing their answers for them – to show them that they’ve got good ideas. It can be more use of ‘rehearse and affirm’ – checking their answers first before they share them. Build them up; don’t catch them out.</p><p><strong>2. Is it possible when hands up is such an ingrained habit?&nbsp;</strong>Yes of course. You need to make a deliberate, definite and sustained effort to change the culture, re-establishing expectations, rehearsing routines and keeping at it. No hands up; no calling out. It means addressing students who don’t follow the expectations. Normally it’s as much about the teacher changing their habits as the students changing theirs. Do it consciously – reminding yourself that unless you cold calling, lots of children learn not to think very hard.</p><p><strong>3. What if students are wrong?</strong>&nbsp;This is something you can anticipate and prepare. It helps to have some scripts that help you create that culture where error and uncertainty are normalised.</p><ul><li><em>That’s a good effort James but not quite right. Let’s try again… what was your first step?</em></li><li><em>I can see what you’re thinking Maya but that’s a different question. Let’s look at it again together…</em></li><li><em>No, you’re not there yet but tell me what you were thinking?</em></li></ul><p>The way a teacher handles error and uncertainty has a huge bearing on students’ willingness to contribute when they are uncertain. Make it normal, low key, unremarkable and focus on the reframing their thinking towards securing understanding. Consolidate, rehearse, use repetition – build confidence.</p><p><strong>4. Doesn’t it slow lessons down?&nbsp;</strong>I’m often asked this but my response is this: Do you want to know if students are struggling? Do you want them all thinking? Yes! The most efficient way to do that is to embed cold calling. If you flush out error and uncertainty during the instructional phase it allows you to re-teach there and then – which is a lot more efficient than waiting for weeks to pass only to discover later. It may feel like you are taking time but this is an investment in deeper understanding for everyone. The illusion given by a few students volunteering good answers, allowing you to zip through the material, risks masking all kinds of misconceptions and uncertainties. It always pays to cold call instead of accepting volunteers.</p><p><strong>5. What if someone has an idea to share?</strong>&nbsp;Of course, cold calling is for when the teacher is asking a question that everyone should think about. However, if students have spontaneous questions or ideas, or if you want to know whether anyone has had a particular experience (<em>has anyone read Catch 22?</em>) you need a process for that and, here, hands up is a good method.&nbsp;<strong><em>Hands up to ask</em></strong>.&nbsp;<em>Michael, thanks for putting your hand up, what’s your question?&nbsp;</em>This is different to when I’m asking everyone to consider a particular question… I need Michael’s hand down so I can cold call.</p><p><strong>6. Is this the same as using lollipop sticks?&nbsp;</strong>No. It’s different in important ways. Randomising who answers does reinforce the idea that everyone should prepare to answer – so it can break the habit of hands up and calling out. However, it removes the interpersonal investment a teacher has in the students. It doesn’t have the same sense of ‘<em>Alice, I’d love to hear your thoughts, because I value your contribution</em>‘. It’s explicitly neutral; functional. The lollistick pot has decided! That has some value and can work alongside cold calling – but is not quite as good or as responsive.</p><h4>REMOTE LEARNING</h4><p>The value of cold calling is more evident than ever in remote learning during live on-screen lessons. Remote learning magnifies many of the issues that are present in a live classroom and possibly provides an opportunity to create some new habits.</p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.18.21.png?w=1024\" height=\"360\" width=\"551\"></a></p><p>Calling out and volunteering is difficult through the technology, so it’s very powerful to use lots of names in cold calling where students are on camera.&nbsp;<em>Michael, what were you thinking? Safia, what did you put for number 6?&nbsp;</em>It’s so important for students to feel that their teachers notice their presence and cold calling has that effect as well as supporting the checking for understanding and thinking. Of course there is the chat stream too and that often allows for some neat combinations.</p><p><em>I’d like everyone to find a simile the poet uses in the first stanza… Prepare the answer but don’t send. 3,2,1, and send.&nbsp;</em>Then we cold call.&nbsp;<em>Safia, let’s hear you explain your choice?&nbsp;Michael – camera trouble? OK, just explain your answer in the chat, thank you.</em></p><p><a href=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png\" target=\"_blank\" style=\"color: rgb(95, 113, 113);\"><img src=\"https://teacherhead.com/wp-content/uploads/2021/02/screenshot-2021-02-07-at-08.17.50.png?w=1024\" height=\"318\" width=\"551\"></a></p><p>The ability to choose answers from the screen or from the chat is very powerful. The expectation that you could choose anyone – in a batched call, a pre-call or a straight cold call – keeps the focus; it folds people into the lesson, feeling they matter. It’s just incredibly powerful; a world away from the opposite where students can volunteer to engage and answer or, volunteer to disengage and say nothing.</p>', 3, 'TOM SHERRINGTON', 'public/blog/icon/fJ45I65yKrcQXUNMMny5XLLISmCsLUUUKgT2IkP9.png', 'public/blog/banner_image/dRJuwJytgxzMkqqy5vA4I6Cw99DRK9Bfrb6MaOXa.png', 'If you’re not yet cold calling as a matter of routine… maybe now is the time to get practising. Make a habit of it.', 'Education, Cold Caling, Methods, Teaching', 0, 0, '2024-06-14 09:52:11', '2024-06-14 09:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Education', '2024-06-14 09:31:29', '2024-06-14 09:31:29'),
(2, 'IPN Forum', '2024-06-14 09:31:42', '2024-06-14 09:31:42'),
(3, 'Knowledge Base', '2024-06-14 09:31:57', '2024-06-14 09:31:57'),
(4, 'Founders Column', '2024-06-14 09:33:05', '2024-06-14 09:33:05'),
(5, 'Other', '2024-06-14 09:33:11', '2024-06-14 09:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled','refunded','pending_reschedule') NOT NULL DEFAULT 'pending',
  `booking_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `time_slot_id`, `status`, `booking_notes`, `created_at`, `updated_at`) VALUES
(1, 2, 62, 'confirmed', 'Any special requests or notes for the trainer', '2025-03-14 00:07:52', '2025-03-15 07:14:01'),
(2, 4, 10, 'confirmed', 'Any special requests or notes for the trainer', '2025-03-14 00:08:01', '2025-04-18 12:28:56'),
(3, 2, 12, 'confirmed', 'Any special requests or notes for the trainer', '2025-03-14 00:08:18', '2025-03-14 00:10:00'),
(4, 4, 61, 'confirmed', 'Any special requests or notes for the trainer', '2025-03-14 00:08:27', '2025-04-18 12:28:47'),
(5, 4, 49, 'cancelled', '', '2025-04-18 11:37:44', '2025-04-18 12:29:00'),
(6, 0, 50, 'confirmed', '', '2025-04-18 11:43:03', '2025-04-18 11:43:13'),
(7, 4, 13, 'pending_reschedule', '', '2025-04-18 12:30:59', '2025-04-18 16:41:09'),
(8, 4, 56, 'pending_reschedule', 'My Name is Don.', '2025-04-18 12:32:12', '2025-04-18 16:41:12'),
(9, 4, 39, 'pending_reschedule', 'My Answer My Questions', '2025-04-18 16:44:10', '2025-04-18 16:45:03'),
(10, 5, 47, 'completed', 'I have some science questions.', '2025-04-18 17:31:19', '2025-04-18 17:49:39'),
(11, 5, 38, 'confirmed', 'I\'m six year old.', '2025-04-18 17:52:56', '2025-04-18 17:53:03'),
(12, 6, 27, 'pending_reschedule', 'My First Session.', '2025-04-19 03:33:00', '2025-04-19 03:39:08'),
(13, 6, 26, 'completed', '', '2025-04-19 03:37:43', '2025-04-19 03:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `is_bought` int(2) NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `requesting_payment` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `webhook` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `is_bought`, `coupon_code`, `discount`, `price`, `payment_id`, `payment_status`, `requesting_payment`, `order_id`, `verify_token`, `url`, `webhook`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2024-08-04 19:48:24', '2024-08-04 19:48:24'),
(2, 2, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2024-08-14 22:36:54', '2024-08-14 22:36:54'),
(3, 3, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2024-09-30 22:45:11', '2024-09-30 22:45:11'),
(4, 4, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2025-03-28 21:40:52', '2025-03-28 21:40:52'),
(5, 5, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2025-04-18 22:56:44', '2025-04-18 22:56:44'),
(6, 6, 0, NULL, 0.00, 0.00, NULL, 0, NULL, NULL, NULL, NULL, 0, '2025-04-19 08:56:50', '2025-04-19 08:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sequence` int(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `sequence`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Education', NULL, 0, 0, '2024-08-11 12:59:00', '2024-08-11 12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` datetime NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` int(11) NOT NULL,
  `event_name` varchar(455) NOT NULL,
  `image` varchar(455) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_12_155615_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` enum('pending','completed','failed','refunded') NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `amount`, `payment_method`, `transaction_id`, `status`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 50.00, 'credit_card', 'txn_123456789', 'completed', '2025-03-11 12:00:00', '2025-03-14 00:09:27', '2025-03-14 00:09:27'),
(2, 2, 50.00, 'credit_card', 'txn_123456789', 'completed', '2025-03-11 12:00:00', '2025-03-14 00:09:55', '2025-03-14 00:09:55'),
(3, 3, 50.00, 'credit_card', 'txn_123456789', 'completed', '2025-03-11 12:00:00', '2025-03-14 00:10:00', '2025-03-14 00:10:00'),
(4, 4, 50.00, 'credit_card', 'txn_123456789', 'completed', '2025-03-11 12:00:00', '2025-03-14 00:10:03', '2025-03-14 00:10:03'),
(5, 5, 500.00, 'pending', NULL, 'pending', NULL, '2025-04-18 11:37:44', '2025-04-18 11:37:44'),
(6, 6, 500.00, 'online', NULL, 'completed', '2025-04-18 11:43:13', '2025-04-18 11:43:03', '2025-04-18 11:43:13'),
(7, 7, 500.00, 'online', NULL, 'completed', '2025-04-18 12:31:03', '2025-04-18 12:30:59', '2025-04-18 12:31:03'),
(8, 8, 500.00, 'online', NULL, 'completed', '2025-04-18 13:31:35', '2025-04-18 12:32:12', '2025-04-18 13:31:35'),
(9, 9, 500.00, 'online', NULL, 'completed', '2025-04-18 16:44:16', '2025-04-18 16:44:10', '2025-04-18 16:44:16'),
(10, 10, 500.00, 'online', NULL, 'completed', '2025-04-18 17:31:22', '2025-04-18 17:31:19', '2025-04-18 17:31:22'),
(11, 11, 500.00, 'online', NULL, 'completed', '2025-04-18 17:53:03', '2025-04-18 17:52:56', '2025-04-18 17:53:03'),
(12, 12, 500.00, 'online', NULL, 'completed', '2025-04-19 03:33:19', '2025-04-19 03:33:00', '2025-04-19 03:33:19'),
(13, 13, 500.00, 'online', NULL, 'completed', '2025-04-19 03:40:12', '2025-04-19 03:37:43', '2025-04-19 03:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(24, 'App\\Models\\Trainer', 2, 'trainer_token', '64dc66f4d22d54da13c8a6316198a53094070d1f7fd1d4869532a5ce9bc96666', '[\"*\"]', NULL, NULL, '2025-03-28 18:42:04', '2025-03-28 18:42:04'),
(25, 'App\\Models\\Trainer', 2, 'trainer_token', 'e658362050a9ae9befb8eaf2abb8af42c8d449d5cf2b2438f0e41b996b831319', '[\"*\"]', NULL, NULL, '2025-03-28 18:54:41', '2025-03-28 18:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `reschedule_approvals`
--

CREATE TABLE `reschedule_approvals` (
  `id` int(11) NOT NULL,
  `reschedule_request_id` int(11) NOT NULL,
  `approved_by_id` int(11) NOT NULL,
  `approved_by_type` enum('user','trainer','admin') NOT NULL,
  `new_time_slot_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reschedule_approvals`
--

INSERT INTO `reschedule_approvals` (`id`, `reschedule_request_id`, `approved_by_id`, `approved_by_type`, `new_time_slot_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'trainer', 61, NULL, '2025-03-15 06:53:43', '2025-03-15 06:53:43'),
(2, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:27', '2025-03-15 07:10:27'),
(3, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:28', '2025-03-15 07:10:28'),
(4, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:37', '2025-03-15 07:10:37'),
(5, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:37', '2025-03-15 07:10:37'),
(6, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:39', '2025-03-15 07:10:39'),
(7, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:39', '2025-03-15 07:10:39'),
(8, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:10:52', '2025-03-15 07:10:52'),
(9, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:11:01', '2025-03-15 07:11:01'),
(10, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:11:03', '2025-03-15 07:11:03'),
(11, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:11:04', '2025-03-15 07:11:04'),
(12, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:11:51', '2025-03-15 07:11:51'),
(13, 1, 2, 'trainer', 61, NULL, '2025-03-15 07:11:51', '2025-03-15 07:11:51'),
(14, 2, 2, 'trainer', 62, NULL, '2025-03-15 07:14:01', '2025-03-15 07:14:01'),
(15, 2, 2, 'trainer', 62, NULL, '2025-03-15 07:17:21', '2025-03-15 07:17:21'),
(16, 2, 2, 'trainer', 62, NULL, '2025-03-15 07:17:23', '2025-03-15 07:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `reschedule_requests`
--

CREATE TABLE `reschedule_requests` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `original_time_slot_id` int(11) NOT NULL,
  `requested_date` date NOT NULL,
  `requested_start_time` time NOT NULL,
  `requested_end_time` time NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_by` enum('user','trainer') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reschedule_requests`
--

INSERT INTO `reschedule_requests` (`id`, `booking_id`, `user_id`, `trainer_id`, `original_time_slot_id`, `requested_date`, `requested_start_time`, `requested_end_time`, `reason`, `status`, `requested_by`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 2, 14, '2025-03-27', '14:00:00', '15:00:00', 'None', 'approved', 'trainer', '2025-03-15 06:53:29', '2025-03-15 07:11:51'),
(2, 1, 2, 2, 8, '2025-03-23', '15:43:00', '13:05:00', 'wq', 'approved', 'trainer', '2025-03-15 07:13:26', '2025-03-15 07:17:23'),
(3, 4, 2, 2, 61, '2025-03-26', '18:00:00', '19:00:00', 'This is meet', 'pending', 'trainer', '2025-03-16 12:16:46', '2025-03-16 12:16:46'),
(4, 7, 4, 2, 13, '2025-09-07', '13:00:00', '14:00:00', 'Nothing I\'m don', 'pending', 'user', '2025-04-18 16:26:46', '2025-04-18 16:26:46'),
(5, 8, 4, 2, 56, '2025-09-21', '11:00:00', '12:00:00', 'This is Aadarsh', 'pending', 'user', '2025-04-18 16:32:21', '2025-04-18 16:32:21'),
(6, 9, 4, 2, 39, '2025-09-14', '17:00:00', '18:00:00', 'I Dont Know', 'pending', 'user', '2025-04-18 16:45:03', '2025-04-18 16:45:03'),
(7, 12, 6, 2, 27, '2025-08-10', '15:00:00', '16:00:00', 'Session', 'pending', 'user', '2025-04-19 03:39:08', '2025-04-19 03:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hg2qLlFHWy5D2AqscFWSpkriA0APtckP1wEUXsAH', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib050MHk1NWxBSkthRWdOS0NraHVDUGZ6QzkxNU53NnVkT0ZVdnhHVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1722774587);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_availability_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `duration_minutes` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('available','booked','cancelled') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `trainer_availability_id`, `start_time`, `end_time`, `duration_minutes`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '10:00:00', '11:00:00', 60, 450.00, 'booked', '2025-03-11 23:37:01', '2025-03-13 23:36:46'),
(2, 2, '10:00:00', '11:00:00', 60, 50.00, 'available', '2025-03-11 23:37:06', '2025-03-11 23:37:06'),
(5, 7, '10:00:00', '11:00:00', 60, 50.00, 'booked', '2025-03-13 19:55:30', '2025-03-14 00:05:31'),
(6, 8, '10:00:00', '11:00:00', 60, 50.00, 'available', '2025-03-13 19:56:41', '2025-03-13 19:56:41'),
(7, 8, '12:00:00', '13:00:00', 60, 50.00, 'available', '2025-03-13 19:57:01', '2025-03-13 19:57:01'),
(8, 18, '12:00:00', '13:00:00', 60, 500.00, 'booked', '2025-03-13 20:06:43', '2025-03-14 00:07:52'),
(9, 18, '14:00:00', '15:00:00', 60, 500.00, 'available', '2025-03-13 20:06:43', '2025-03-13 20:06:43'),
(10, 19, '12:00:00', '13:00:00', 60, 400.00, 'booked', '2025-03-13 20:20:56', '2025-03-14 00:08:01'),
(12, 30, '16:00:00', '17:00:00', 60, 500.00, 'booked', '2025-03-13 20:20:57', '2025-03-14 00:08:18'),
(13, 20, '12:00:00', '13:00:00', 60, 500.00, 'booked', '2025-03-13 20:21:28', '2025-04-18 12:30:59'),
(14, 20, '14:00:00', '15:00:00', 60, 500.00, 'booked', '2025-03-13 20:21:28', '2025-03-14 00:08:28'),
(15, 20, '16:00:00', '17:00:00', 60, 500.00, 'available', '2025-03-13 20:21:29', '2025-03-13 20:21:29'),
(21, 22, '09:00:00', '10:00:00', 60, 500.00, 'available', '2025-03-13 20:33:10', '2025-03-13 20:33:10'),
(22, 22, '11:00:00', '12:00:00', 60, 500.00, 'available', '2025-03-13 20:33:11', '2025-03-13 20:33:11'),
(23, 22, '13:00:00', '14:00:00', 60, 500.00, 'available', '2025-03-13 20:33:11', '2025-03-13 20:33:11'),
(24, 22, '15:00:00', '16:00:00', 60, 500.00, 'available', '2025-03-13 20:33:12', '2025-03-13 20:33:12'),
(25, 22, '17:00:00', '18:00:00', 60, 500.00, 'available', '2025-03-13 20:33:13', '2025-03-13 20:33:13'),
(26, 23, '09:00:00', '10:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:13', '2025-04-19 03:37:43'),
(27, 23, '11:00:00', '12:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:14', '2025-04-19 03:33:00'),
(28, 23, '13:00:00', '14:00:00', 60, 500.00, 'available', '2025-03-13 20:33:14', '2025-03-13 20:33:14'),
(29, 23, '15:00:00', '16:00:00', 60, 500.00, '', '2025-03-13 20:33:15', '2025-04-19 03:39:08'),
(30, 23, '17:00:00', '18:00:00', 60, 500.00, 'available', '2025-03-13 20:33:16', '2025-03-13 20:33:16'),
(31, 24, '09:00:00', '10:00:00', 60, 500.00, 'available', '2025-03-13 20:33:16', '2025-03-13 20:33:16'),
(32, 24, '11:00:00', '12:00:00', 60, 500.00, 'available', '2025-03-13 20:33:17', '2025-03-13 20:33:17'),
(33, 24, '13:00:00', '14:00:00', 60, 500.00, 'available', '2025-03-13 20:33:17', '2025-03-13 20:33:17'),
(34, 24, '15:00:00', '16:00:00', 60, 500.00, 'available', '2025-03-13 20:33:18', '2025-03-13 20:33:18'),
(35, 24, '17:00:00', '18:00:00', 60, 500.00, 'available', '2025-03-13 20:33:19', '2025-03-13 20:33:19'),
(36, 25, '09:00:00', '10:00:00', 60, 500.00, 'available', '2025-03-13 20:33:21', '2025-03-13 20:33:21'),
(37, 25, '11:00:00', '12:00:00', 60, 500.00, 'available', '2025-03-13 20:33:21', '2025-03-13 20:33:21'),
(38, 25, '13:00:00', '14:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:22', '2025-04-18 17:52:56'),
(39, 25, '15:00:00', '16:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:22', '2025-04-18 16:44:10'),
(40, 25, '17:00:00', '18:00:00', 60, 500.00, 'available', '2025-03-13 20:33:23', '2025-03-13 20:33:23'),
(41, 26, '09:00:00', '10:00:00', 60, 500.00, 'available', '2025-03-13 20:33:24', '2025-03-13 20:33:24'),
(42, 26, '11:00:00', '12:00:00', 60, 500.00, 'available', '2025-03-13 20:33:24', '2025-03-13 20:33:24'),
(43, 26, '13:00:00', '14:00:00', 60, 500.00, 'available', '2025-03-13 20:33:25', '2025-03-13 20:33:25'),
(44, 26, '15:00:00', '16:00:00', 60, 500.00, 'available', '2025-03-13 20:33:26', '2025-03-13 20:33:26'),
(45, 26, '17:00:00', '18:00:00', 60, 500.00, 'available', '2025-03-13 20:33:26', '2025-03-13 20:33:26'),
(46, 27, '09:00:00', '10:00:00', 60, 500.00, 'available', '2025-03-13 20:33:27', '2025-03-13 20:33:27'),
(47, 27, '11:00:00', '12:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:28', '2025-04-18 17:31:19'),
(48, 27, '13:00:00', '14:00:00', 60, 500.00, '', '2025-03-13 20:33:29', '2025-04-18 16:26:46'),
(49, 27, '15:00:00', '16:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:30', '2025-04-18 11:37:44'),
(50, 27, '17:00:00', '18:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:31', '2025-04-18 11:43:03'),
(52, 28, '11:00:00', '12:00:00', 60, 500.00, 'available', '2025-03-13 20:33:32', '2025-03-13 20:33:32'),
(53, 28, '13:00:00', '14:00:00', 60, 500.00, 'available', '2025-03-13 20:33:33', '2025-03-13 20:33:33'),
(54, 28, '15:00:00', '16:00:00', 60, 500.00, 'available', '2025-03-13 20:33:34', '2025-03-13 20:33:34'),
(55, 28, '17:00:00', '18:00:00', 60, 500.00, '', '2025-03-13 20:33:35', '2025-04-18 16:45:03'),
(56, 29, '09:00:00', '10:00:00', 60, 500.00, 'booked', '2025-03-13 20:33:35', '2025-04-18 12:32:12'),
(57, 29, '11:00:00', '12:00:00', 60, 500.00, '', '2025-03-13 20:33:36', '2025-04-18 16:32:21'),
(61, 9, '14:00:00', '15:00:00', 60, 500.00, 'booked', '2025-03-15 06:53:43', '2025-03-15 06:53:43'),
(62, 13, '15:43:00', '13:05:00', 60, 500.00, 'booked', '2025-03-15 07:14:01', '2025-03-15 07:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `hero_img` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `short_about` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL,
  `email` varchar(255) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_type` enum('trainer') NOT NULL DEFAULT 'trainer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `first_name`, `last_name`, `hero_img`, `profile_img`, `short_about`, `about`, `designation`, `created_at`, `updated_at`, `email`, `passcode`, `mobile`, `remember_token`, `user_type`) VALUES
(1, 'John', 'Doe', 'public/trainer/hero/lISXKY7qFNm6iNnEla9MmC3LhOr0pZPl0zk8u4aR.png', 'public/trainer/profile/ppUh0ND7apEa83aHqtUUEP2ovzdJdcIxrT2eFX9M.png', 'Experienced fitness trainer with 10+ years of experience', 'Detailed biography of the trainer with qualifications and experience', 'Senior Fitness Trainer', '2025-03-11 23:31:44', '2025-03-11 23:31:44', 'john.doe@example.com', '$2y$12$MjvSBPBalQq8tmX1ADREl.cK3bgGZ4v25c9QyTzGKqTW26o7KDbQm', '1234567890', '', 'trainer'),
(2, 'Aadarsh', 'Gupta', 'public/trainer/hero/lISXKY7qFNm6iNnEla9MmC3LhOr0pZPl0zk8u4aR.png', 'public/trainer/profile/ppUh0ND7apEa83aHqtUUEP2ovzdJdcIxrT2eFX9M.png', 'Experienced fitness trainer with 10+ years of experience.', 'Detailed biography of the trainer with qualifications and experience.', 'Senior Fitness', '2025-03-11 23:33:25', '2025-03-28 18:54:41', 'aadarshkavita@gmail.com', '$2y$12$MUeLU7v8G2dKR6.NpppQlue0uo6k9rGR4v.9GzGtDzGAkD4Hmio1W', '9399380920', 'mpKodJPeoVQPqGwl54FPultaKSfEQutMmT3pwRAC2EPeDkBc6XacdwJUwhkV', 'trainer'),
(3, 'Gaurava', 'Yadav', 'public/trainer/hero/lISXKY7qFNm6iNnEla9MmC3LhOr0pZPl0zk8u4aR.png', 'public/trainer/profile/ppUh0ND7apEa83aHqtUUEP2ovzdJdcIxrT2eFX9M.png', 'International Award-winning entrepreneur and founder of Indian Principals\' Network (IPN) FORUM, India\'s largest knowledge network of school leaders.', 'Gaurava Yadav is an International Award-winning entrepreneur and a prominent figure in the Indian Subcontinent\'s education ecosystem. As the founder of the Indian Principals\' Network (IPN) FORUM, India\'s largest knowledge network of school leaders, he has been instrumental in transforming educational leadership and teacher development. <br/>\nUnder his visionary leadership, the IPN FORUM has empowered over 15,000 school leaders and more than 500,000 teachers, fostering a culture of excellence and continuous growth in education. His efforts are dedicated to bridging the gap in educational upskilling and creating impactful learning experiences across India and neighboring regions. <br/>\nBeyond his work with IPN, Gaurava is also the founder of EduAce Services, building India\'s biggest School Quiz company with a focus on discovering talent from Tier 2 and Tier 3 towns. His initiatives have reached over 150,000 students across 43 cities in 10 states.', 'CEO Founder IPN', '2025-04-19 11:10:10', '2025-04-19 11:10:10', 'gaurava.v@eduace.in', '$2y$12$PFJmBNANgVGxL8YjLr/r/OA4YZMERIq26FVBV1u7K0I73P96H9Wfa', '8400700199', NULL, 'trainer');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_availabilities`
--

CREATE TABLE `trainer_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_availabilities`
--

INSERT INTO `trainer_availabilities` (`id`, `trainer_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-03-30', '2025-03-11 23:34:09', '2025-03-11 23:34:09'),
(2, 1, '2025-03-31', '2025-03-11 23:34:58', '2025-03-11 23:34:58'),
(3, 2, '2025-03-31', '2025-03-11 23:35:01', '2025-03-11 23:35:01'),
(4, 2, '2025-03-30', '2025-03-11 23:35:05', '2025-03-11 23:35:05'),
(5, 2, '2025-03-29', '2025-03-11 23:35:11', '2025-03-11 23:35:11'),
(7, 2, '2025-03-26', '2025-03-13 00:58:11', '2025-03-13 00:58:11'),
(8, 2, '2025-04-08', '2025-03-13 19:36:28', '2025-03-13 19:36:28'),
(9, 2, '2025-03-27', '2025-03-13 19:39:16', '2025-03-13 19:39:16'),
(10, 2, '2025-03-22', '2025-03-13 19:44:38', '2025-03-13 19:44:38'),
(13, 2, '2025-03-23', '2025-03-13 19:50:23', '2025-03-13 19:50:23'),
(14, 2, '2025-03-25', '2025-03-13 19:52:15', '2025-03-13 19:52:15'),
(15, 2, '2025-03-18', '2025-03-13 20:03:11', '2025-03-13 20:03:11'),
(16, 2, '2025-04-30', '2025-03-13 20:03:55', '2025-03-13 20:03:55'),
(17, 2, '2025-04-02', '2025-03-13 20:04:50', '2025-03-13 20:04:50'),
(18, 2, '2025-04-03', '2025-03-13 20:06:43', '2025-03-13 20:06:43'),
(19, 2, '2025-03-13', '2025-03-13 20:20:56', '2025-03-13 20:20:56'),
(20, 2, '2025-06-28', '2025-03-13 20:21:27', '2025-03-13 20:21:27'),
(22, 2, '2025-08-03', '2025-03-13 20:33:10', '2025-03-13 20:33:10'),
(23, 2, '2025-08-10', '2025-03-13 20:33:13', '2025-03-13 20:33:13'),
(24, 2, '2025-08-17', '2025-03-13 20:33:16', '2025-03-13 20:33:16'),
(25, 2, '2025-08-24', '2025-03-13 20:33:20', '2025-03-13 20:33:20'),
(26, 2, '2025-08-31', '2025-03-13 20:33:23', '2025-03-13 20:33:23'),
(27, 2, '2025-09-07', '2025-03-13 20:33:27', '2025-03-13 20:33:27'),
(28, 2, '2025-09-14', '2025-03-13 20:33:31', '2025-03-13 20:33:31'),
(29, 2, '2025-09-21', '2025-03-13 20:33:35', '2025-03-13 20:33:35'),
(30, 2, '2025-03-14', '2025-03-13 18:36:20', '2025-03-13 18:36:20'),
(31, 2, '2025-05-15', '2025-03-16 17:39:49', '2025-03-16 17:39:49'),
(32, 2, '2025-04-23', '2025-03-28 18:43:01', '2025-03-28 18:43:01'),
(33, 2, '2025-11-12', '2025-03-28 18:44:28', '2025-03-28 18:44:28'),
(34, 2, '2025-12-17', '2025-03-28 18:55:19', '2025-03-28 18:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_reviews`
--

CREATE TABLE `trainer_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_reviews`
--

INSERT INTO `trainer_reviews` (`id`, `booking_id`, `user_id`, `trainer_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 5, 'Excellent trainer! Very knowledgeable and motivating.', '2025-03-14 00:42:15', '2025-03-14 00:42:15'),
(2, 3, 1, 2, 5, 'Excellent trainer! Very knowledgeable and motivating.', '2025-03-14 00:42:33', '2025-03-14 00:42:33'),
(3, 1, 2, 2, 5, 'Excellent trainer! Very knowledgeable and motivating.', '2025-03-14 00:44:38', '2025-03-14 00:44:38'),
(6, 10, 5, 2, 5, 'Great Session by IMk', '2025-04-18 17:59:48', '2025-04-18 18:04:23'),
(7, 13, 6, 2, 5, 'Good Session.', '2025-04-19 03:41:09', '2025-04-19 03:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_specializations`
--

CREATE TABLE `trainer_specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_specializations`
--

INSERT INTO `trainer_specializations` (`id`, `trainer_id`, `specialization`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yoga', '2025-03-11 23:32:10', '2025-03-11 23:32:10'),
(4, 2, 'Training', '2025-03-16 17:48:58', '2025-03-16 17:48:58'),
(5, 3, 'Motivation', '2025-04-19 05:42:48', '2025-04-19 05:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `mobile_verified` int(2) DEFAULT 0,
  `email_verified` int(2) DEFAULT 0,
  `is_data` int(2) NOT NULL DEFAULT 0,
  `user_type` varchar(255) DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `first_name`, `last_name`, `school`, `city`, `country_code`, `mobile`, `about`, `grade`, `icon`, `banner`, `mobile_verified`, `email_verified`, `is_data`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aadarshkavita@gmail.com', NULL, 'Aadarsh Gupta', 'Gupta', 'Dr. B R Ambedkar National Institute of Technology, Jalandhar', 'Deedhori', '+1', '3139424892', NULL, '12', NULL, NULL, 1, 0, 1, 'admin', '123456', 'ybWZqzPoAsEMt4BzhBwjncEAn7VQWUBMw9fsueISzdyoPd9OqM8CeFr42iQW', '2024-08-04 19:45:40', '2024-08-10 00:18:30'),
(2, 'aadarshkavita@gmail.com', NULL, 'Aadarsh Gupta', 'Gupta', 'Dr. B R Ambedkar National Institute of Technology, Jalandhar', 'Deedhori', '+1', '3139424892', NULL, '12', NULL, NULL, 1, 0, 1, 'user', NULL, 'ZPnhAtYnN9PP1kLg0FzSLeGp0pdON39zHkKPl6WJq8rHaiHcuL4COlFCvJnc', '2024-08-14 22:36:54', '2024-08-14 22:37:10'),
(3, 'digital.endeavour.in+new@gmail.com', NULL, 'Aadarsh Gupta', 'Gupta', 'Dr. B R Ambedkar National Institute of Technology, Jalandhar', 'Deedhori', '+91', '9399380920', NULL, '11', NULL, NULL, 1, 0, 1, 'admin', NULL, 'xTtqv6cI8ot8G04WWvJr229a5YxroHBZYiaJsWO63gpTT2B8wZD32D57Lb6P', '2024-09-30 22:45:11', '2025-03-11 22:02:30'),
(4, 'digital.endeavour.in@gmail.com', NULL, 'Aadarsh', 'Gupta', 'Little Angels College', 'Kathmandu', '+91', '9399380920', 'My Name Is imkaadarsh', '11', '', NULL, 1, 0, 1, 'user', NULL, 'cbsSeRuualrmpyiS1Hzz68wSU1ERVZkNVMO2Z8rjDvYRZ8YNyap10vTSNzbM', '2025-03-28 21:40:52', '2025-04-19 15:47:02'),
(5, 'aadarshkavita+sumit@gmail.com', NULL, 'Sumit', 'Verma', 'Dr. B R Ambedkar National Institute of Technology', 'Jalandhar', '+91', '9617091766', 'My Name is Khan', '11', '', NULL, 1, 0, 1, 'user', NULL, 'JmspZS2Rs9NVDeti8LpBCUKHgoJjPyPxmC7bh8Og7bQzkKlPiRIZJhV51Y5T', '2025-04-18 22:56:44', '2025-04-19 08:53:25'),
(6, 'Vijeta.v@eduace.in', NULL, 'Vijeta', 'Valsan', 'Eduace Services', 'Delhi', '+91', '9246308588', 'My name is Vijeta', '12', '', NULL, 1, 0, 1, 'user', NULL, '9YfOTPg8UGwoHboBYCuB3F578Pq8aJmHM7aO7sNJ0pFwiV96Rjn9hnx8g6w5', '2025-04-19 08:56:49', '2025-04-19 08:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2550) NOT NULL,
  `category_id` int(255) NOT NULL,
  `icon_image` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `requirements` varchar(2500) DEFAULT NULL,
  `mode` varchar(255) NOT NULL,
  `map` varchar(2550) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `title`, `description`, `category_id`, `icon_image`, `banner_image`, `start_date`, `duration`, `language`, `state`, `location`, `requirements`, `mode`, `map`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'English For Success, Personality Development, For Life', 'Learning a language is natural at a young age. It is a fun ride for the child especially when taught using fun-based activities online for kids. However, for kids who miss language training early on, have to do a lot of hard-work to catch-up in later years.', 1, 'public/workshop/icon_image/QERBEUOn6Nv1Wj1UqTSt3b2OfKrK3MfVA5bnCNuH.png', 'public/workshop/banner_image/v3vVg3VPpTB8dadTwYiFglJjvy9E9cjNHTAMpwpR.png', '2024-09-01', '05:00 PM - 07:00 PM', 'English', 'Maharashtra', 'Mumbai', 'Internet connection.<br> Laptops.<br> Smart Class Room.', 'Online', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120632.89399988184!2d72.7951167313304!3d19.117395364172083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b6405dfecb73%3A0xdd676dd65229813!2sSMT%20RAJ%20RANI%20MALHOTRA%20VIDYALAYA!5e0!3m2!1sen!2sin!4v1723366472332!5m2!1sen!2sin', 0, '2024-08-11 12:59:39', '2024-08-11 12:59:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_index` (`user_id`),
  ADD KEY `bookings_time_slot_id_index` (`time_slot_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_index` (`booking_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reschedule_approvals`
--
ALTER TABLE `reschedule_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reschedule_request_id` (`reschedule_request_id`),
  ADD KEY `new_time_slot_id` (`new_time_slot_id`);

--
-- Indexes for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `original_time_slot_id` (`original_time_slot_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_slots_trainer_availability_id_index` (`trainer_availability_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_availabilities`
--
ALTER TABLE `trainer_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_availabilities_trainer_id_index` (`trainer_id`);

--
-- Indexes for table `trainer_reviews`
--
ALTER TABLE `trainer_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainer_reviews_booking_id_unique` (`booking_id`),
  ADD KEY `trainer_reviews_user_id_index` (`user_id`),
  ADD KEY `trainer_reviews_trainer_id_index` (`trainer_id`);

--
-- Indexes for table `trainer_specializations`
--
ALTER TABLE `trainer_specializations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_specializations_trainer_id_index` (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reschedule_approvals`
--
ALTER TABLE `reschedule_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainer_availabilities`
--
ALTER TABLE `trainer_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `trainer_reviews`
--
ALTER TABLE `trainer_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainer_specializations`
--
ALTER TABLE `trainer_specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_trainer_availability_id_foreign` FOREIGN KEY (`trainer_availability_id`) REFERENCES `trainer_availabilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainer_reviews`
--
ALTER TABLE `trainer_reviews`
  ADD CONSTRAINT `trainer_reviews_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
