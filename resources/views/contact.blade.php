@extends('layouts.app')

@section('content')
<div class="bg-[#f7f1eb]">
    <!-- Hero -->
    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center rounded-full bg-pink-100 px-4 py-1 text-sm font-semibold text-pink-600 mb-5">
                        Contact Kampot Pie & Ice Cream
                    </span>

                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-[#4b2e2b]">
                        Let’s make your next order
                        <span class="text-pink-500">extra special</span>
                    </h1>

                    <p class="mt-5 text-lg text-[#7a5c55] leading-8 max-w-xl">
                        Reach out for bakery orders, custom cakes, dessert boxes, and general inquiries.
                        We’d love to help you find something sweet for every moment.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#contact-form"
                           class="inline-flex items-center justify-center rounded-2xl bg-[#4b2e2b] px-6 py-3 text-white font-semibold hover:opacity-90 transition">
                            Send Inquiry
                        </a>
                        <a href="tel:+85500000000"
                           class="inline-flex items-center justify-center rounded-2xl border border-[#4b2e2b] px-6 py-3 text-[#4b2e2b] font-semibold hover:bg-[#4b2e2b] hover:text-white transition">
                            Call Us
                        </a>
                    </div>
                </div>

                <div>
                    <div class="relative rounded-[2rem] bg-[#fff7f0] shadow-xl border border-[#f0e4d8] p-6 md:p-8">
                        <div class="absolute -top-4 -right-4 h-20 w-20 rounded-full bg-pink-200 blur-2xl opacity-70"></div>
                        <div class="absolute -bottom-4 -left-4 h-20 w-20 rounded-full bg-amber-200 blur-2xl opacity-70"></div>

                        <div class="relative">
                            <img src="{{ asset('image/logokampotpie.jpg') }}"
                                 alt="Kampot Pie & Ice Cream"
                                 class="w-28 h-28 rounded-full object-cover mx-auto shadow-md border-4 border-white">

                            <div class="text-center mt-5">
                                <h2 class="text-2xl font-bold text-[#4b2e2b]">Kampot Pie & Ice Cream</h2>
                                <p class="text-[#7a5c55] mt-2">
                                    Fresh pastries, warm desserts, and homemade sweetness with care.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                                <div class="rounded-2xl bg-[#fffaf5] border border-[#f3e6d9] p-4">
                                    <p class="text-sm text-[#9a7c72]">Specialty</p>
                                    <p class="text-lg font-semibold text-[#4b2e2b]">Cakes, pies & desserts</p>
                                </div>

                                <div class="rounded-2xl bg-[#fffaf5] border border-[#f3e6d9] p-4">
                                    <p class="text-sm text-[#9a7c72]">Service</p>
                                    <p class="text-lg font-semibold text-[#4b2e2b]">Orders & inquiries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-px bg-gradient-to-r from-transparent via-[#ead8c6] to-transparent"></div>
    </section>

    <!-- Contact Cards -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-[#fff7f0] rounded-3xl shadow-sm border border-[#f0e4d8] p-6">
                <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-pink-600 text-xl mb-4">
                    ✆
                </div>
                <h3 class="text-xl font-bold text-[#4b2e2b] mb-2">Phone</h3>
                <p class="text-[#7a5c55]">Call us for orders and quick inquiries.</p>
                <p class="mt-4 font-semibold text-[#4b2e2b]">+855 XX XXX XXX</p>
            </div>

            <div class="bg-[#fff7f0] rounded-3xl shadow-sm border border-[#f0e4d8] p-6">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 text-xl mb-4">
                    ✉
                </div>
                <h3 class="text-xl font-bold text-[#4b2e2b] mb-2">Email</h3>
                <p class="text-[#7a5c55]">Send us your custom order details anytime.</p>
                <p class="mt-4 font-semibold text-[#4b2e2b] break-all">kampotpie@example.com</p>
            </div>

            <div class="bg-[#fff7f0] rounded-3xl shadow-sm border border-[#f0e4d8] p-6">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl mb-4">
                    ⌂
                </div>
                <h3 class="text-xl font-bold text-[#4b2e2b] mb-2">Location</h3>
                <p class="text-[#7a5c55]">Visit us for fresh bakery treats.</p>
                <p class="mt-4 font-semibold text-[#4b2e2b]">Kampot, Cambodia</p>
            </div>

            <div class="bg-[#fff7f0] rounded-3xl shadow-sm border border-[#f0e4d8] p-6">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl mb-4">
                    ⏰
                </div>
                <h3 class="text-xl font-bold text-[#4b2e2b] mb-2">Opening Hours</h3>
                <p class="text-[#7a5c55]">Available daily for sweet moments.</p>
                <p class="mt-4 font-semibold text-[#4b2e2b]">8:00 AM - 8:00 PM</p>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section id="contact-form" class="max-w-7xl mx-auto px-6 lg:px-8 pb-16 lg:pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <!-- Form -->
            <div class="lg:col-span-3 bg-[#fff7f0] rounded-[2rem] shadow-sm border border-[#f0e4d8] p-6 md:p-8">
                <div class="mb-8">
                    <span class="inline-block rounded-full bg-[#fff3ea] px-4 py-1 text-sm font-semibold text-[#c26a3d] mb-4">
                        Send us a message
                    </span>
                    <h2 class="text-3xl font-bold text-[#4b2e2b]">We’d love to hear from you</h2>
                    <p class="text-[#7a5c55] mt-3">
                        Whether it’s a custom cake, a dessert table, or a simple question, send us your details below.
                    </p>
                </div>

                <form class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-[#4b2e2b] mb-2">Full Name</label>
                            <input type="text"
                                   placeholder="Your name"
                                   class="w-full rounded-2xl border border-[#e8d8c8] bg-[#fffdfb] px-4 py-3 text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#4b2e2b] mb-2">Phone Number</label>
                            <input type="text"
                                   placeholder="Your phone"
                                   class="w-full rounded-2xl border border-[#e8d8c8] bg-[#fffdfb] px-4 py-3 text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4b2e2b] mb-2">Email Address</label>
                        <input type="email"
                               placeholder="Your email"
                               class="w-full rounded-2xl border border-[#e8d8c8] bg-[#fffdfb] px-4 py-3 text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4b2e2b] mb-2">Inquiry Type</label>
                        <select class="w-full rounded-2xl border border-[#e8d8c8] bg-[#fffdfb] px-4 py-3 text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300">
                            <option>General Inquiry</option>
                            <option>Custom Cake Order</option>
                            <option>Bulk Order</option>
                            <option>Birthday / Event Order</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4b2e2b] mb-2">Message</label>
                        <textarea rows="6"
                                  placeholder="Tell us about your order or question..."
                                  class="w-full rounded-2xl border border-[#e8d8c8] bg-[#fffdfb] px-4 py-3 text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="button"
                                class="inline-flex items-center justify-center rounded-2xl bg-pink-500 px-6 py-3 text-white font-semibold hover:bg-pink-600 transition">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Side Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-[#fff7f0] rounded-[2rem] shadow-sm border border-[#f0e4d8] p-6 md:p-8">
                    <h3 class="text-2xl font-bold text-[#4b2e2b] mb-4">Why contact us?</h3>
                    <div class="space-y-4 text-[#7a5c55]">
                        <div class="flex gap-3">
                            <span class="text-pink-500 font-bold">•</span>
                            <p>Custom birthday cakes and celebration desserts.</p>
                        </div>
                        <div class="flex gap-3">
                            <span class="text-pink-500 font-bold">•</span>
                            <p>Bulk pastry and dessert orders for events.</p>
                        </div>
                        <div class="flex gap-3">
                            <span class="text-pink-500 font-bold">•</span>
                            <p>Questions about available menu items and pricing.</p>
                        </div>
                        <div class="flex gap-3">
                            <span class="text-pink-500 font-bold">•</span>
                            <p>Friendly support for special requests and inquiries.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#f3e4d7] rounded-[2rem] shadow-sm border border-[#e6d2c2] p-6 md:p-8">
                    <h2 class="text-3xl font-bold text-[#4b2e2b]">
                        Sweet moments start here
                    </h2>

                    <p class="text-[#6b4f4f] mt-2">
                        We put care into every dessert, pastry, and cake. Contact us and let us help make your order memorable.
                    </p>

                    <div class="mt-6 space-y-3">
                        <div class="rounded-2xl bg-[#fff7f0] px-4 py-3 border border-[#ead8c6]">
                            <p class="text-sm text-[#8a6c63]">Fast Response</p>
                            <p class="font-semibold text-[#4b2e2b]">Friendly order support</p>
                        </div>

                        <div class="rounded-2xl bg-[#fff7f0] px-4 py-3 border border-[#ead8c6]">
                            <p class="text-sm text-[#8a6c63]">Custom Orders</p>
                            <p class="font-semibold text-[#4b2e2b]">Designed for your occasion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection