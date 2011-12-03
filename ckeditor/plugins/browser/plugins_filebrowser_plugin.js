
<!-- saved from url=(0084)http://docs.cksource.com/ckeditor_api/symbols/src/plugins_filebrowser_plugin.js.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <style>
	.KEYW {color: #933;}
	.COMM {color: #bbb; font-style: italic;}
	.NUMB {color: #393;}
	.STRN {color: #393;}
	.REGX {color: #339;}
	.line {border-right: 1px dotted #666; color: #666; font-style: normal;}
	</style></head><body><pre><span class="line">  1</span> <span class="TOKN">﻿</span><span class="COMM">/*
<span class="line">  2</span> Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
<span class="line">  3</span> For licensing, see LICENSE.html or http://ckeditor.com/license
<span class="line">  4</span> */</span><span class="WHIT">
<span class="line">  5</span> 
<span class="line">  6</span> </span><span class="COMM">/**
<span class="line">  7</span>  * @fileOverview The "filebrowser" plugin that adds support for file uploads and
<span class="line">  8</span>  *               browsing.
<span class="line">  9</span>  *
<span class="line"> 10</span>  * When a file is uploaded or selected inside the file browser, its URL is
<span class="line"> 11</span>  * inserted automatically into a field defined in the &lt;code&gt;filebrowser&lt;/code&gt;
<span class="line"> 12</span>  * attribute. In order to specify a field that should be updated, pass the tab ID and
<span class="line"> 13</span>  * the element ID, separated with a colon.&lt;br /&gt;&lt;br /&gt;
<span class="line"> 14</span>  *
<span class="line"> 15</span>  * &lt;strong&gt;Example 1: (Browse)&lt;/strong&gt;
<span class="line"> 16</span>  *
<span class="line"> 17</span>  * &lt;pre&gt;
<span class="line"> 18</span>  * {
<span class="line"> 19</span>  * 	type : 'button',
<span class="line"> 20</span>  * 	id : 'browse',
<span class="line"> 21</span>  * 	filebrowser : 'tabId:elementId',
<span class="line"> 22</span>  * 	label : editor.lang.common.browseServer
<span class="line"> 23</span>  * }
<span class="line"> 24</span>  * &lt;/pre&gt;
<span class="line"> 25</span>  *
<span class="line"> 26</span>  * If you set the &lt;code&gt;filebrowser&lt;/code&gt; attribute for an element other than
<span class="line"> 27</span>  * the &lt;code&gt;fileButton&lt;/code&gt;, the &lt;code&gt;Browse&lt;/code&gt; action will be triggered.&lt;br /&gt;&lt;br /&gt;
<span class="line"> 28</span>  *
<span class="line"> 29</span>  * &lt;strong&gt;Example 2: (Quick Upload)&lt;/strong&gt;
<span class="line"> 30</span>  *
<span class="line"> 31</span>  * &lt;pre&gt;
<span class="line"> 32</span>  * {
<span class="line"> 33</span>  * 	type : 'fileButton',
<span class="line"> 34</span>  * 	id : 'uploadButton',
<span class="line"> 35</span>  * 	filebrowser : 'tabId:elementId',
<span class="line"> 36</span>  * 	label : editor.lang.common.uploadSubmit,
<span class="line"> 37</span>  * 	'for' : [ 'upload', 'upload' ]
<span class="line"> 38</span>  * }
<span class="line"> 39</span>  * &lt;/pre&gt;
<span class="line"> 40</span>  *
<span class="line"> 41</span>  * If you set the &lt;code&gt;filebrowser&lt;/code&gt; attribute for a &lt;code&gt;fileButton&lt;/code&gt;
<span class="line"> 42</span>  * element, the &lt;code&gt;QuickUpload&lt;/code&gt; action will be executed.&lt;br /&gt;&lt;br /&gt;
<span class="line"> 43</span>  *
<span class="line"> 44</span>  * The filebrowser plugin also supports more advanced configuration performed through
<span class="line"> 45</span>  * a JavaScript object.
<span class="line"> 46</span>  *
<span class="line"> 47</span>  * The following settings are supported:
<span class="line"> 48</span>  *
<span class="line"> 49</span>  * &lt;ul&gt;
<span class="line"> 50</span>  * &lt;li&gt;&lt;code&gt;action&lt;/code&gt; – &lt;code&gt;Browse&lt;/code&gt; or &lt;code&gt;QuickUpload&lt;/code&gt;.&lt;/li&gt;
<span class="line"> 51</span>  * &lt;li&gt;&lt;code&gt;target&lt;/code&gt; – the field to update in the &lt;code&gt;&lt;em&gt;tabId:elementId&lt;/em&gt;&lt;/code&gt; format.&lt;/li&gt;
<span class="line"> 52</span>  * &lt;li&gt;&lt;code&gt;params&lt;/code&gt; – additional arguments to be passed to the server connector (optional).&lt;/li&gt;
<span class="line"> 53</span>  * &lt;li&gt;&lt;code&gt;onSelect&lt;/code&gt; – a function to execute when the file is selected/uploaded (optional).&lt;/li&gt;
<span class="line"> 54</span>  * &lt;li&gt;&lt;code&gt;url&lt;/code&gt; – the URL to be called (optional).&lt;/li&gt;
<span class="line"> 55</span>  * &lt;/ul&gt;
<span class="line"> 56</span>  *
<span class="line"> 57</span>  * &lt;strong&gt;Example 3: (Quick Upload)&lt;/strong&gt;
<span class="line"> 58</span>  *
<span class="line"> 59</span>  * &lt;pre&gt;
<span class="line"> 60</span>  * {
<span class="line"> 61</span>  * 	type : 'fileButton',
<span class="line"> 62</span>  * 	label : editor.lang.common.uploadSubmit,
<span class="line"> 63</span>  * 	id : 'buttonId',
<span class="line"> 64</span>  * 	filebrowser :
<span class="line"> 65</span>  * 	{
<span class="line"> 66</span>  * 		action : 'QuickUpload', // required
<span class="line"> 67</span>  * 		target : 'tab1:elementId', // required
<span class="line"> 68</span>  * 		params : // optional
<span class="line"> 69</span>  * 		{
<span class="line"> 70</span>  * 			type : 'Files',
<span class="line"> 71</span>  * 			currentFolder : '/folder/'
<span class="line"> 72</span>  * 		},
<span class="line"> 73</span>  * 		onSelect : function( fileUrl, errorMessage ) // optional
<span class="line"> 74</span>  * 		{
<span class="line"> 75</span>  * 			// Do not call the built-in selectFuntion.
<span class="line"> 76</span>  * 			// return false;
<span class="line"> 77</span>  * 		}
<span class="line"> 78</span>  * 	},
<span class="line"> 79</span>  * 	'for' : [ 'tab1', 'myFile' ]
<span class="line"> 80</span>  * }
<span class="line"> 81</span>  * &lt;/pre&gt;
<span class="line"> 82</span>  *
<span class="line"> 83</span>  * Suppose you have a file element with an ID of &lt;code&gt;myFile&lt;/code&gt;, a text
<span class="line"> 84</span>  * field with an ID of &lt;code&gt;elementId&lt;/code&gt; and a &lt;code&gt;fileButton&lt;/code&gt;.
<span class="line"> 85</span>  * If the &lt;code&gt;filebowser.url&lt;/code&gt; attribute is not specified explicitly,
<span class="line"> 86</span>  * the form action will be set to &lt;code&gt;filebrowser[&lt;em&gt;DialogWindowName&lt;/em&gt;]UploadUrl&lt;/code&gt;
<span class="line"> 87</span>  * or, if not specified, to &lt;code&gt;filebrowserUploadUrl&lt;/code&gt;. Additional parameters
<span class="line"> 88</span>  * from the &lt;code&gt;params&lt;/code&gt; object will be added to the query string. It is
<span class="line"> 89</span>  * possible to create your own &lt;code&gt;uploadHandler&lt;/code&gt; and cancel the built-in
<span class="line"> 90</span>  * &lt;code&gt;updateTargetElement&lt;/code&gt; command.&lt;br /&gt;&lt;br /&gt;
<span class="line"> 91</span>  *
<span class="line"> 92</span>  * &lt;strong&gt;Example 4: (Browse)&lt;/strong&gt;
<span class="line"> 93</span>  *
<span class="line"> 94</span>  * &lt;pre&gt;
<span class="line"> 95</span>  * {
<span class="line"> 96</span>  * 	type : 'button',
<span class="line"> 97</span>  * 	id : 'buttonId',
<span class="line"> 98</span>  * 	label : editor.lang.common.browseServer,
<span class="line"> 99</span>  * 	filebrowser :
<span class="line">100</span>  * 	{
<span class="line">101</span>  * 		action : 'Browse',
<span class="line">102</span>  * 		url : '/ckfinder/ckfinder.html&amp;type=Images',
<span class="line">103</span>  * 		target : 'tab1:elementId'
<span class="line">104</span>  * 	}
<span class="line">105</span>  * }
<span class="line">106</span>  * &lt;/pre&gt;
<span class="line">107</span>  *
<span class="line">108</span>  * In this example, when the button is pressed, the file browser will be opened in a
<span class="line">109</span>  * popup window. If you do not specify the &lt;code&gt;filebrowser.url&lt;/code&gt; attribute,
<span class="line">110</span>  * &lt;code&gt;filebrowser[&lt;em&gt;DialogName&lt;/em&gt;]BrowseUrl&lt;/code&gt; or
<span class="line">111</span>  * &lt;code&gt;filebrowserBrowseUrl&lt;/code&gt; will be used. After selecting a file in the file
<span class="line">112</span>  * browser, an element with an ID of &lt;code&gt;elementId&lt;/code&gt; will be updated. Just
<span class="line">113</span>  * like in the third example, a custom &lt;code&gt;onSelect&lt;/code&gt; function may be defined.
<span class="line">114</span>  */</span><span class="WHIT">
<span class="line">115</span> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">function</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="WHIT">
<span class="line">116</span> </span><span class="PUNC">{</span><span class="WHIT">
<span class="line">117</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">118</span> 	 * Adds (additional) arguments to given url.
<span class="line">119</span> 	 *
<span class="line">120</span> 	 * @param {String}
<span class="line">121</span> 	 *            url The url.
<span class="line">122</span> 	 * @param {Object}
<span class="line">123</span> 	 *            params Additional parameters.
<span class="line">124</span> 	 */</span><span class="WHIT">
<span class="line">125</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">addQueryString</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">126</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">127</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">queryString</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="PUNC">[</span><span class="PUNC">]</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">128</span> 
<span class="line">129</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">130</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">131</span> </span><span class="WHIT">		</span><span class="KEYW">else</span><span class="WHIT">
<span class="line">132</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">133</span> </span><span class="WHIT">			</span><span class="KEYW">for</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="KEYW">in</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">134</span> </span><span class="WHIT">				</span><span class="NAME">queryString.push</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="STRN">"="</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">encodeURIComponent</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">params</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">135</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">136</span> 
<span class="line">137</span> </span><span class="WHIT">		</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url.indexOf</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">"?"</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">!=</span><span class="WHIT"> </span><span class="PUNC">-</span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">?</span><span class="WHIT"> </span><span class="STRN">"&amp;"</span><span class="WHIT"> </span><span class="PUNC">:</span><span class="WHIT"> </span><span class="STRN">"?"</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">queryString.join</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">"&amp;"</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">138</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">139</span> 
<span class="line">140</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">141</span> 	 * Make a string's first character uppercase.
<span class="line">142</span> 	 *
<span class="line">143</span> 	 * @param {String}
<span class="line">144</span> 	 *            str String.
<span class="line">145</span> 	 */</span><span class="WHIT">
<span class="line">146</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">ucFirst</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">str</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">147</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">148</span> </span><span class="WHIT">		</span><span class="NAME">str</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="PUNC">=</span><span class="WHIT"> </span><span class="STRN">''</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">149</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">f</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">str.charAt</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">toUpperCase</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">150</span> </span><span class="WHIT">		</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="NAME">f</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">str.substr</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">151</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">152</span> 
<span class="line">153</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">154</span> 	 * The onlick function assigned to the 'Browse Server' button. Opens the
<span class="line">155</span> 	 * file browser and updates target field when file is selected.
<span class="line">156</span> 	 *
<span class="line">157</span> 	 * @param {CKEDITOR.event}
<span class="line">158</span> 	 *            evt The event object.
<span class="line">159</span> 	 */</span><span class="WHIT">
<span class="line">160</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">browseServer</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">161</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">162</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">dialog</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this.getDialog</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">163</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">dialog.getParentEditor</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">164</span> 
<span class="line">165</span> </span><span class="WHIT">		</span><span class="NAME">editor._.filebrowserSe</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">166</span> 
<span class="line">167</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">width</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'filebrowser'</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">ucFirst</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">dialog.getName</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="STRN">'WindowWidth'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT">
<span class="line">168</span> </span><span class="WHIT">				</span><span class="PUNC">||</span><span class="WHIT"> </span><span class="NAME">editor.config.filebrowserWindowWidth</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="STRN">'80%'</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">169</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">height</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'filebrowser'</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">ucFirst</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">dialog.getName</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="STRN">'WindowHeight'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT">
<span class="line">170</span> </span><span class="WHIT">				</span><span class="PUNC">||</span><span class="WHIT"> </span><span class="NAME">editor.config.filebrowserWindowHeight</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="STRN">'70%'</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">171</span> 
<span class="line">172</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this.filebrowser.params</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="PUNC">{</span><span class="PUNC">}</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">173</span> </span><span class="WHIT">		</span><span class="NAME">params.CKEditor</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.name</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">174</span> </span><span class="WHIT">		</span><span class="NAME">params.CKEditorFuncNum</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor._.filebrowserFn</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">175</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">params.langCode</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">176</span> </span><span class="WHIT">			</span><span class="NAME">params.langCode</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.langCode</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">177</span> 
<span class="line">178</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">addQueryString</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">this.filebrowser.url</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">179</span> </span><span class="WHIT">		</span><span class="COMM">// TODO: V4: Remove backward compatibility (#8163).</span><span class="WHIT">
<span class="line">180</span> </span><span class="WHIT">		</span><span class="NAME">editor.popup</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">width</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">height</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">editor.config.filebrowserWindowFeatures</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="NAME">editor.config.fileBrowserWindowFeatures</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">181</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">182</span> 
<span class="line">183</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">184</span> 	 * The onlick function assigned to the 'Upload' button. Makes the final
<span class="line">185</span> 	 * decision whether form is really submitted and updates target field when
<span class="line">186</span> 	 * file is uploaded.
<span class="line">187</span> 	 *
<span class="line">188</span> 	 * @param {CKEDITOR.event}
<span class="line">189</span> 	 *            evt The event object.
<span class="line">190</span> 	 */</span><span class="WHIT">
<span class="line">191</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">uploadFile</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">192</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">193</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">dialog</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this.getDialog</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">194</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">dialog.getParentEditor</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">195</span> 
<span class="line">196</span> </span><span class="WHIT">		</span><span class="NAME">editor._.filebrowserSe</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">197</span> 
<span class="line">198</span> </span><span class="WHIT">		</span><span class="COMM">// If user didn't select the file, stop the upload.</span><span class="WHIT">
<span class="line">199</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">dialog.getContentElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">getInputElement</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">$.value</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">200</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">201</span> 
<span class="line">202</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">dialog.getContentElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="KEYW">this</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">getAction</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">203</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">204</span> 
<span class="line">205</span> </span><span class="WHIT">		</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">true</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">206</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">207</span> 
<span class="line">208</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">209</span> 	 * Setups the file element.
<span class="line">210</span> 	 *
<span class="line">211</span> 	 * @param {CKEDITOR.ui.dialog.file}
<span class="line">212</span> 	 *            fileInput The file element used during file upload.
<span class="line">213</span> 	 * @param {Object}
<span class="line">214</span> 	 *            filebrowser Object containing filebrowser settings assigned to
<span class="line">215</span> 	 *            the fileButton associated with this file element.
<span class="line">216</span> 	 */</span><span class="WHIT">
<span class="line">217</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">setupFileElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">fileInput</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">filebrowser</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">218</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">219</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">filebrowser.params</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="PUNC">{</span><span class="PUNC">}</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">220</span> </span><span class="WHIT">		</span><span class="NAME">params.CKEditor</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.name</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">221</span> </span><span class="WHIT">		</span><span class="NAME">params.CKEditorFuncNum</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor._.filebrowserFn</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">222</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">params.langCode</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">223</span> </span><span class="WHIT">			</span><span class="NAME">params.langCode</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.langCode</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">224</span> 
<span class="line">225</span> </span><span class="WHIT">		</span><span class="NAME">fileInput.action</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">addQueryString</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">filebrowser.url</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">params</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">226</span> </span><span class="WHIT">		</span><span class="NAME">fileInput.filebrowser</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">filebrowser</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">227</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">228</span> 
<span class="line">229</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">230</span> 	 * Traverse through the content definition and attach filebrowser to
<span class="line">231</span> 	 * elements with 'filebrowser' attribute.
<span class="line">232</span> 	 *
<span class="line">233</span> 	 * @param String
<span class="line">234</span> 	 *            dialogName Dialog name.
<span class="line">235</span> 	 * @param {CKEDITOR.dialog.definitionObject}
<span class="line">236</span> 	 *            definition Dialog definition.
<span class="line">237</span> 	 * @param {Array}
<span class="line">238</span> 	 *            elements Array of {@link CKEDITOR.dialog.definition.content}
<span class="line">239</span> 	 *            objects.
<span class="line">240</span> 	 */</span><span class="WHIT">
<span class="line">241</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">attachFileBrowser</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">dialogName</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">elements</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">242</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">243</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">element</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">fileInput</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">244</span> 
<span class="line">245</span> </span><span class="WHIT">		</span><span class="KEYW">for</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="KEYW">in</span><span class="WHIT"> </span><span class="NAME">elements</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">246</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">247</span> </span><span class="WHIT">			</span><span class="NAME">element</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">elements</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">248</span> 
<span class="line">249</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element.type</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'hbox'</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="NAME">element.type</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'vbox'</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="NAME">element.type</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'fieldset'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">250</span> </span><span class="WHIT">				</span><span class="NAME">attachFileBrowser</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">dialogName</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">element.children</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">251</span> 
<span class="line">252</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">253</span> </span><span class="WHIT">				</span><span class="KEYW">continue</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">254</span> 
<span class="line">255</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">typeof</span><span class="WHIT"> </span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'string'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">256</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">257</span> </span><span class="WHIT">				</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">fb</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT">
<span class="line">258</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">259</span> </span><span class="WHIT">					</span><span class="NAME">action</span><span class="WHIT"> </span><span class="PUNC">:</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element.type</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'fileButton'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">?</span><span class="WHIT"> </span><span class="STRN">'QuickUpload'</span><span class="WHIT"> </span><span class="PUNC">:</span><span class="WHIT"> </span><span class="STRN">'Browse'</span><span class="PUNC">,</span><span class="WHIT">
<span class="line">260</span> </span><span class="WHIT">					</span><span class="NAME">target</span><span class="WHIT"> </span><span class="PUNC">:</span><span class="WHIT"> </span><span class="NAME">element.filebrowser</span><span class="WHIT">
<span class="line">261</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">262</span> </span><span class="WHIT">				</span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">fb</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">263</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">264</span> 
<span class="line">265</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element.filebrowser.action</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'Browse'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">266</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">267</span> </span><span class="WHIT">				</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">element.filebrowser.url</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">268</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="NAME">undefined</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">269</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">270</span> </span><span class="WHIT">					</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'filebrowser'</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">ucFirst</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">dialogName</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="STRN">'BrowseUrl'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">271</span> </span><span class="WHIT">					</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="NAME">undefined</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">272</span> </span><span class="WHIT">						</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config.filebrowserBrowseUrl</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">273</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">274</span> 
<span class="line">275</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">276</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">277</span> </span><span class="WHIT">					</span><span class="NAME">element.onClick</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">browseServer</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">278</span> </span><span class="WHIT">					</span><span class="NAME">element.filebrowser.url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">279</span> </span><span class="WHIT">					</span><span class="NAME">element.hidden</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">280</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">281</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">282</span> </span><span class="WHIT">			</span><span class="KEYW">else</span><span class="WHIT"> </span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element.filebrowser.action</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'QuickUpload'</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">element</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">283</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">284</span> </span><span class="WHIT">				</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">element.filebrowser.url</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">285</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="NAME">undefined</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">286</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">287</span> </span><span class="WHIT">					</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'filebrowser'</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="NAME">ucFirst</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">dialogName</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">+</span><span class="WHIT"> </span><span class="STRN">'UploadUrl'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">288</span> </span><span class="WHIT">					</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="NAME">undefined</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">289</span> </span><span class="WHIT">						</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">editor.config.filebrowserUploadUrl</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">290</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">291</span> 
<span class="line">292</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">293</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">294</span> </span><span class="WHIT">					</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">onClick</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">element.onClick</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">295</span> </span><span class="WHIT">					</span><span class="NAME">element.onClick</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="KEYW">function</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">296</span> </span><span class="WHIT">					</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">297</span> </span><span class="WHIT">						</span><span class="COMM">// "element" here means the definition object, so we need to find the correct</span><span class="WHIT">
<span class="line">298</span> </span><span class="WHIT">						</span><span class="COMM">// button to scope the event call</span><span class="WHIT">
<span class="line">299</span> </span><span class="WHIT">						</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">sender</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">evt.sender</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">300</span> </span><span class="WHIT">						</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">onClick</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">onClick.call</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">sender</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">301</span> </span><span class="WHIT">							</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">302</span> 
<span class="line">303</span> </span><span class="WHIT">						</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="NAME">uploadFile.call</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">sender</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">304</span> </span><span class="WHIT">					</span><span class="PUNC">}</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">305</span> 
<span class="line">306</span> </span><span class="WHIT">					</span><span class="NAME">element.filebrowser.url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">307</span> </span><span class="WHIT">					</span><span class="NAME">element.hidden</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">308</span> </span><span class="WHIT">					</span><span class="NAME">setupFileElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">definition.getContents</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">get</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">309</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">310</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">311</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">312</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">313</span> 
<span class="line">314</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">315</span> 	 * Updates the target element with the url of uploaded/selected file.
<span class="line">316</span> 	 *
<span class="line">317</span> 	 * @param {String}
<span class="line">318</span> 	 *            url The url of a file.
<span class="line">319</span> 	 */</span><span class="WHIT">
<span class="line">320</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">updateTargetElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">sourceElement</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">321</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">322</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">dialog</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">sourceElement.getDialog</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">323</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">targetElement</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">sourceElement.filebrowser.target</span><span class="WHIT"> </span><span class="PUNC">||</span><span class="WHIT"> </span><span class="KEYW">null</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">324</span> </span><span class="WHIT">		</span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">url.replace</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="REGX">/#/g</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="STRN">'%23'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">325</span> 
<span class="line">326</span> </span><span class="WHIT">		</span><span class="COMM">// If there is a reference to targetElement, update it.</span><span class="WHIT">
<span class="line">327</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">targetElement</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">328</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">329</span> </span><span class="WHIT">			</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">target</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">targetElement.split</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">':'</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">330</span> </span><span class="WHIT">			</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">element</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">dialog.getContentElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">target</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">target</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">331</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">332</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">333</span> </span><span class="WHIT">				</span><span class="NAME">element.setValue</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">url</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">334</span> </span><span class="WHIT">				</span><span class="NAME">dialog.selectPage</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">target</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">335</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">336</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">337</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">338</span> 
<span class="line">339</span> </span><span class="WHIT">	</span><span class="COMM">/*
<span class="line">340</span> 	 * Returns true if filebrowser is configured in one of the elements.
<span class="line">341</span> 	 *
<span class="line">342</span> 	 * @param {CKEDITOR.dialog.definitionObject}
<span class="line">343</span> 	 *            definition Dialog definition.
<span class="line">344</span> 	 * @param String
<span class="line">345</span> 	 *            tabId The tab id where element(s) can be found.
<span class="line">346</span> 	 * @param String
<span class="line">347</span> 	 *            elementId The element id (or ids, separated with a semicolon) to check.
<span class="line">348</span> 	 */</span><span class="WHIT">
<span class="line">349</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">isConfigured</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">tabId</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">elementId</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">350</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">351</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">elementId.indexOf</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">";"</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">!==</span><span class="WHIT"> </span><span class="PUNC">-</span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">352</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">353</span> </span><span class="WHIT">			</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">ids</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">elementId.split</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">";"</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">354</span> </span><span class="WHIT">			</span><span class="KEYW">for</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">;</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">&lt;</span><span class="WHIT"> </span><span class="NAME">ids.length</span><span class="WHIT"> </span><span class="PUNC">;</span><span class="WHIT"> </span><span class="NAME">i</span><span class="PUNC">++</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">355</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">356</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">isConfigured</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">tabId</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">ids</span><span class="PUNC">[</span><span class="NAME">i</span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">357</span> </span><span class="WHIT">					</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">true</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">358</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">359</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">360</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">361</span> 
<span class="line">362</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">elementFileBrowser</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">definition.getContents</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">tabId</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">get</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">elementId</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">filebrowser</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">363</span> </span><span class="WHIT">		</span><span class="KEYW">return</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">elementFileBrowser</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">elementFileBrowser.url</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">364</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">365</span> 
<span class="line">366</span> </span><span class="WHIT">	</span><span class="KEYW">function</span><span class="WHIT"> </span><span class="NAME">setUrl</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">fileUrl</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">367</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">368</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">dialog</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe.getDialog</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">,</span><span class="WHIT">
<span class="line">369</span> </span><span class="WHIT">			</span><span class="NAME">targetInput</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'for'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT">
<span class="line">370</span> </span><span class="WHIT">			</span><span class="NAME">onSelect</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe.filebrowser.onSelect</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">371</span> 
<span class="line">372</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">targetInput</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">373</span> </span><span class="WHIT">			</span><span class="NAME">dialog.getContentElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">targetInput</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">0</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">targetInput</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NUMB">1</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">.</span><span class="NAME">reset</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">374</span> 
<span class="line">375</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">typeof</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'function'</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">data.call</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">376</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">377</span> 
<span class="line">378</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">onSelect</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">onSelect.call</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">fileUrl</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">===</span><span class="WHIT"> </span><span class="KEYW">false</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">379</span> </span><span class="WHIT">			</span><span class="KEYW">return</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">380</span> 
<span class="line">381</span> </span><span class="WHIT">		</span><span class="COMM">// The "data" argument may be used to pass the error message to the editor.</span><span class="WHIT">
<span class="line">382</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">typeof</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">==</span><span class="WHIT"> </span><span class="STRN">'string'</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">383</span> </span><span class="WHIT">			</span><span class="NAME">alert</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">data</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">384</span> 
<span class="line">385</span> </span><span class="WHIT">		</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">fileUrl</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">386</span> </span><span class="WHIT">			</span><span class="NAME">updateTargetElement</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">fileUrl</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserSe</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">387</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">388</span> 
<span class="line">389</span> </span><span class="WHIT">	</span><span class="NAME">CKEDITOR.plugins.add</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">'filebrowser'</span><span class="PUNC">,</span><span class="WHIT">
<span class="line">390</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">391</span> </span><span class="WHIT">		</span><span class="NAME">init</span><span class="WHIT"> </span><span class="PUNC">:</span><span class="WHIT"> </span><span class="KEYW">function</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">pluginPath</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">392</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">393</span> </span><span class="WHIT">			</span><span class="NAME">editor._.filebrowserFn</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">CKEDITOR.tools.addFunction</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">setUrl</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">editor</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">394</span> </span><span class="WHIT">			</span><span class="NAME">editor.on</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">'destroy'</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="KEYW">function</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">{</span><span class="WHIT"> </span><span class="NAME">CKEDITOR.tools.removeFunction</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">this._.filebrowserFn</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT"> </span><span class="PUNC">}</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">395</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">396</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">397</span> 
<span class="line">398</span> </span><span class="WHIT">	</span><span class="NAME">CKEDITOR.on</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="STRN">'dialogDefinition'</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="KEYW">function</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">evt</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">399</span> </span><span class="WHIT">	</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">400</span> </span><span class="WHIT">		</span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">evt.data.definition</span><span class="PUNC">,</span><span class="WHIT">
<span class="line">401</span> </span><span class="WHIT">			</span><span class="NAME">element</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">402</span> </span><span class="WHIT">		</span><span class="COMM">// Associate filebrowser to elements with 'filebrowser' attribute.</span><span class="WHIT">
<span class="line">403</span> </span><span class="WHIT">		</span><span class="KEYW">for</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="KEYW">var</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="KEYW">in</span><span class="WHIT"> </span><span class="NAME">definition.contents</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">404</span> </span><span class="WHIT">		</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">405</span> </span><span class="WHIT">			</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="NAME">definition.contents</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="NAME">i</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">406</span> </span><span class="WHIT">			</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">407</span> </span><span class="WHIT">				</span><span class="NAME">attachFileBrowser</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">evt.editor</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">evt.data.name</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">element.elements</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">408</span> </span><span class="WHIT">				</span><span class="KEYW">if</span><span class="WHIT"> </span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">element.hidden</span><span class="WHIT"> </span><span class="PUNC">&amp;&amp;</span><span class="WHIT"> </span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="WHIT">
<span class="line">409</span> </span><span class="WHIT">				</span><span class="PUNC">{</span><span class="WHIT">
<span class="line">410</span> </span><span class="WHIT">					</span><span class="NAME">element.hidden</span><span class="WHIT"> </span><span class="PUNC">=</span><span class="WHIT"> </span><span class="PUNC">!</span><span class="NAME">isConfigured</span><span class="PUNC">(</span><span class="WHIT"> </span><span class="NAME">definition</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">element</span><span class="PUNC">[</span><span class="WHIT"> </span><span class="STRN">'id'</span><span class="WHIT"> </span><span class="PUNC">]</span><span class="PUNC">,</span><span class="WHIT"> </span><span class="NAME">element.filebrowser</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">411</span> </span><span class="WHIT">				</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">412</span> </span><span class="WHIT">			</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">413</span> </span><span class="WHIT">		</span><span class="PUNC">}</span><span class="WHIT">
<span class="line">414</span> </span><span class="WHIT">	</span><span class="PUNC">}</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">415</span> 
<span class="line">416</span> </span><span class="PUNC">}</span><span class="WHIT"> </span><span class="PUNC">)</span><span class="PUNC">(</span><span class="PUNC">)</span><span class="PUNC">;</span><span class="WHIT">
<span class="line">417</span> 
<span class="line">418</span> </span><span class="COMM">/**
<span class="line">419</span>  * The location of an external file browser that should be launched when the &lt;strong&gt;Browse Server&lt;/strong&gt;
<span class="line">420</span>  * button is pressed. If configured, the &lt;strong&gt;Browse Server&lt;/strong&gt; button will appear in the
<span class="line">421</span>  * &lt;strong&gt;Link&lt;/strong&gt;, &lt;strong&gt;Image&lt;/strong&gt;, and &lt;strong&gt;Flash&lt;/strong&gt; dialog windows.
<span class="line">422</span>  * @see The &lt;a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/File_Browser_(Uploader)"&gt;File Browser/Uploader&lt;/a&gt; documentation.
<span class="line">423</span>  * @name CKEDITOR.config.filebrowserBrowseUrl
<span class="line">424</span>  * @since 3.0
<span class="line">425</span>  * @type String
<span class="line">426</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">427</span>  * @example
<span class="line">428</span>  * config.filebrowserBrowseUrl = '/browser/browse.php';
<span class="line">429</span>  */</span><span class="WHIT">
<span class="line">430</span> 
<span class="line">431</span> </span><span class="COMM">/**
<span class="line">432</span>  * The location of the script that handles file uploads.
<span class="line">433</span>  * If set, the &lt;strong&gt;Upload&lt;/strong&gt; tab will appear in the &lt;strong&gt;Link&lt;/strong&gt;, &lt;strong&gt;Image&lt;/strong&gt;,
<span class="line">434</span>  * and &lt;strong&gt;Flash&lt;/strong&gt; dialog windows.
<span class="line">435</span>  * @name CKEDITOR.config.filebrowserUploadUrl
<span class="line">436</span>  * @see The &lt;a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/File_Browser_(Uploader)"&gt;File Browser/Uploader&lt;/a&gt; documentation.
<span class="line">437</span>  * @since 3.0
<span class="line">438</span>  * @type String
<span class="line">439</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">440</span>  * @example
<span class="line">441</span>  * config.filebrowserUploadUrl = '/uploader/upload.php';
<span class="line">442</span>  */</span><span class="WHIT">
<span class="line">443</span> 
<span class="line">444</span> </span><span class="COMM">/**
<span class="line">445</span>  * The location of an external file browser that should be launched when the &lt;strong&gt;Browse Server&lt;/strong&gt;
<span class="line">446</span>  * button is pressed in the &lt;strong&gt;Image&lt;/strong&gt; dialog window.
<span class="line">447</span>  * If not set, CKEditor will use &lt;code&gt;{@link CKEDITOR.config.filebrowserBrowseUrl}&lt;/code&gt;.
<span class="line">448</span>  * @name CKEDITOR.config.filebrowserImageBrowseUrl
<span class="line">449</span>  * @since 3.0
<span class="line">450</span>  * @type String
<span class="line">451</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">452</span>  * @example
<span class="line">453</span>  * config.filebrowserImageBrowseUrl = '/browser/browse.php?type=Images';
<span class="line">454</span>  */</span><span class="WHIT">
<span class="line">455</span> 
<span class="line">456</span> </span><span class="COMM">/**
<span class="line">457</span>  * The location of an external file browser that should be launched when the &lt;strong&gt;Browse Server&lt;/strong&gt;
<span class="line">458</span>  * button is pressed in the &lt;strong&gt;Flash&lt;/strong&gt; dialog window.
<span class="line">459</span>  * If not set, CKEditor will use &lt;code&gt;{@link CKEDITOR.config.filebrowserBrowseUrl}&lt;/code&gt;.
<span class="line">460</span>  * @name CKEDITOR.config.filebrowserFlashBrowseUrl
<span class="line">461</span>  * @since 3.0
<span class="line">462</span>  * @type String
<span class="line">463</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">464</span>  * @example
<span class="line">465</span>  * config.filebrowserFlashBrowseUrl = '/browser/browse.php?type=Flash';
<span class="line">466</span>  */</span><span class="WHIT">
<span class="line">467</span> 
<span class="line">468</span> </span><span class="COMM">/**
<span class="line">469</span>  * The location of the script that handles file uploads in the &lt;strong&gt;Image&lt;/strong&gt; dialog window.
<span class="line">470</span>  * If not set, CKEditor will use &lt;code&gt;{@link CKEDITOR.config.filebrowserUploadUrl}&lt;/code&gt;.
<span class="line">471</span>  * @name CKEDITOR.config.filebrowserImageUploadUrl
<span class="line">472</span>  * @since 3.0
<span class="line">473</span>  * @type String
<span class="line">474</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">475</span>  * @example
<span class="line">476</span>  * config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images';
<span class="line">477</span>  */</span><span class="WHIT">
<span class="line">478</span> 
<span class="line">479</span> </span><span class="COMM">/**
<span class="line">480</span>  * The location of the script that handles file uploads in the &lt;strong&gt;Flash&lt;/strong&gt; dialog window.
<span class="line">481</span>  * If not set, CKEditor will use &lt;code&gt;{@link CKEDITOR.config.filebrowserUploadUrl}&lt;/code&gt;.
<span class="line">482</span>  * @name CKEDITOR.config.filebrowserFlashUploadUrl
<span class="line">483</span>  * @since 3.0
<span class="line">484</span>  * @type String
<span class="line">485</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">486</span>  * @example
<span class="line">487</span>  * config.filebrowserFlashUploadUrl = '/uploader/upload.php?type=Flash';
<span class="line">488</span>  */</span><span class="WHIT">
<span class="line">489</span> 
<span class="line">490</span> </span><span class="COMM">/**
<span class="line">491</span>  * The location of an external file browser that should be launched when the &lt;strong&gt;Browse Server&lt;/strong&gt;
<span class="line">492</span>  * button is pressed in the &lt;strong&gt;Link&lt;/strong&gt; tab of the &lt;strong&gt;Image&lt;/strong&gt; dialog window.
<span class="line">493</span>  * If not set, CKEditor will use &lt;code&gt;{@link CKEDITOR.config.filebrowserBrowseUrl}&lt;/code&gt;.
<span class="line">494</span>  * @name CKEDITOR.config.filebrowserImageBrowseLinkUrl
<span class="line">495</span>  * @since 3.2
<span class="line">496</span>  * @type String
<span class="line">497</span>  * @default &lt;code&gt;''&lt;/code&gt; (empty string = disabled)
<span class="line">498</span>  * @example
<span class="line">499</span>  * config.filebrowserImageBrowseLinkUrl = '/browser/browse.php';
<span class="line">500</span>  */</span><span class="WHIT">
<span class="line">501</span> 
<span class="line">502</span> </span><span class="COMM">/**
<span class="line">503</span>  * The features to use in the file browser popup window.
<span class="line">504</span>  * @name CKEDITOR.config.filebrowserWindowFeatures
<span class="line">505</span>  * @since 3.4.1
<span class="line">506</span>  * @type String
<span class="line">507</span>  * @default &lt;code&gt;'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes,scrollbars=yes'&lt;/code&gt;
<span class="line">508</span>  * @example
<span class="line">509</span>  * config.filebrowserWindowFeatures = 'resizable=yes,scrollbars=no';
<span class="line">510</span>  */</span><span class="WHIT">
<span class="line">511</span> 
<span class="line">512</span> </span><span class="COMM">/**
<span class="line">513</span>  * The width of the file browser popup window. It can be a number denoting a value in
<span class="line">514</span>  * pixels or a percent string.
<span class="line">515</span>  * @name CKEDITOR.config.filebrowserWindowWidth
<span class="line">516</span>  * @type Number|String
<span class="line">517</span>  * @default &lt;code&gt;'80%'&lt;/code&gt;
<span class="line">518</span>  * @example
<span class="line">519</span>  * config.filebrowserWindowWidth = 750;
<span class="line">520</span>  * @example
<span class="line">521</span>  * config.filebrowserWindowWidth = '50%';
<span class="line">522</span>  */</span><span class="WHIT">
<span class="line">523</span> 
<span class="line">524</span> </span><span class="COMM">/**
<span class="line">525</span>  * The height of the file browser popup window. It can be a number denoting a value in
<span class="line">526</span>  * pixels or a percent string.
<span class="line">527</span>  * @name CKEDITOR.config.filebrowserWindowHeight
<span class="line">528</span>  * @type Number|String
<span class="line">529</span>  * @default &lt;code&gt;'70%'&lt;/code&gt;
<span class="line">530</span>  * @example
<span class="line">531</span>  * config.filebrowserWindowHeight = 580;
<span class="line">532</span>  * @example
<span class="line">533</span>  * config.filebrowserWindowHeight = '50%';
<span class="line">534</span>  */</span><span class="WHIT">
<span class="line">535</span> </span></pre></body></html>