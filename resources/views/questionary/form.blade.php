<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>QuestionaryPart1</title>

        
    </head>
    <body>
        <h1>Part1</h1>
        <div class="center">
            <form name="questionary" action="/questionary/store" method="post">
                {{ csrf_field() }}
                
                <fieldset>
                <input id="item-1" class="radio-inline__input2" type="radio" name="gender" value="1" checked=""/>
                <label class="radio-inline__label2" for="item-1">
                    男性
                </label>
                <input id="item-2" class="radio-inline__input" type="radio" name="gender" value="2"/>
                <label class="radio-inline__label" for="item-2">
                    女性
                </label>
                </fieldset>
                <div>
                    <!-- <label>年齢</label>
                    <input type="text" name="age"> -->
                    <select name="age">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                    </select>　歳
                </div>      
                <!-- <div>
                    <label for="height">身長</label>
                    <input type="text" name="height">
                </div>
                <div>
                    <label for="weight">体重</label>
                    <input type="text" name="weight">
                </div> -->
                <div>
                @foreach ($eats as $eat)
                    <label><input name="eat{{$eat->id}}" type="checkbox" value="{{$eat->id}}">{{$eat->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($emotions as $emotion)
                    <label><input name="emotion{{$emotion->id}}" type="checkbox" value="{{$emotion->id}}">{{$emotion->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($hobbies as $hobby)
                    <label><input name="hobby{{$hobby->id}}" type="checkbox" value="{{$hobby->id}}">{{$hobby->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($personalities as $personality)
                    <label><input name="personality{{$personality->id}}" type="checkbox" value="{{$personality->id}}">{{$personality->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($works as $work)
                    <label><input name="work{{$work->id}}" type="checkbox" value="{{$work->id}}">{{$work->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($musics as $music)
                    <label><input name="music{{$music->id}}" type="checkbox" value="{{$music->id}}">{{$music->name}}</label>
                @endforeach
                </div>
                <div class="menu-submit">
                    <button type="submit">次へ</button>
                </div>
            </form>
        </div>
        <!-- <script src="/js/birthday.js"></script> -->
    </body>
</html>
