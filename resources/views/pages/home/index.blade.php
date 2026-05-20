<x-layouts.app title="TicketFlix — Book Movies & Events">
    <section class="hero" style="padding-top: 100px; min-height: 700px; background: radial-gradient(circle at 20% 50%, rgba(232,25,44,0.05) 0%, transparent 50%);">
        <div class="hero-bg"></div>
        <div class="container" style="display: flex; gap: 80px; align-items: center; position: relative; z-index: 2;">
            <div class="hero-content-box" style="flex: 1; border-left: 2px solid var(--red-dark); padding-left: 48px;">
                <div class="hero-eyebrow" style="color: var(--red); letter-spacing: 2px; font-weight: 700; margin-bottom: 24px; font-size: 14px; text-transform: uppercase;">✦ NOW SHOWING & HAPPENING NEAR YOU</div>
                <h1 class="hero-title" style="font-size: 100px; line-height: 0.85; margin-bottom: 32px; font-family: var(--font-display); letter-spacing: 4px;">MOVIES.<br>EVENTS.<br>ONE CLICK.</h1>
                <p class="hero-desc" style="font-size: 18px; margin-bottom: 48px; opacity: 0.7; max-width: 520px; line-height: 1.6;">Book movie tickets, concerts, sports, and live events — all in one place. No queues. Instant confirmation.</p>
                
                <x-movie.movie-search />
            </div>

            <div class="hero-filmstrip-v" style="width: 380px; display: flex; flex-direction: column; gap: 12px; opacity: 0.4;">
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a0505, #1a0505); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #05054a, #05051a); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #054a05, #051a05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a4a05, #1a1a05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a054a, #1a051a); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promos & Offers Section -->
    <section class="promos-section" style="padding-top: 40px; padding-bottom: 20px; background: var(--black);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                <!-- Wallet Offer Card -->
                <div class="custom-offer-card" style="background: linear-gradient(135deg, rgba(168,85,247,0.08) 0%, rgba(232,25,44,0.03) 100%); border: 1px solid rgba(168,85,247,0.25); padding: 24px 32px; border-radius: 16px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 30px rgba(168,85,247,0.05); transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(168,85,247,0.5)'; this.style.boxShadow='0 12px 30px rgba(168,85,247,0.15)';" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(168,85,247,0.25)'; this.style.boxShadow='0 4px 30px rgba(168,85,247,0.05)';">
                    <div style="display: flex; align-items: center; gap: 20px; z-index: 2;">
                        <div style="width: 52px; height: 52px; background: rgba(168,85,247,0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px; flex-shrink: 0; box-shadow: 0 4px 12px rgba(168,85,247,0.1);">👛</div>
                        <div style="line-height: 1.5;">
                            <strong style="color: var(--white); font-weight: 700; font-size: 16px; display: block; margin-bottom: 4px; letter-spacing: 0.5px;">Welcome Wallet Bonus</strong>
                            <span style="color: var(--muted); font-size: 14px;">Complete your first booking and get <span style="color: var(--gold); font-weight: 700;">₹100.00</span> credited instantly to your wallet!</span>
                        </div>
                    </div>
                    <div style="font-family: var(--font-mono); color: var(--gold); border: 1px dashed var(--gold); padding: 8px 18px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; letter-spacing: 1px; background: rgba(245,200,66,0.04); z-index: 2; transition: all 0.2s;" onmouseover="this.style.background='rgba(245,200,66,0.1)'" onmouseout="this.style.background='rgba(245,200,66,0.04)'">AUTO-CREDIT</div>
                </div>

                <!-- HDFC Bank Offer -->
                <div class="custom-offer-card" style="background: linear-gradient(135deg, rgba(232,25,44,0.08) 0%, rgba(10,10,11,0.2) 100%); border: 1px solid rgba(232,25,44,0.2); padding: 24px 32px; border-radius: 16px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 30px rgba(232,25,44,0.03); transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(232,25,44,0.45)'; this.style.boxShadow='0 12px 30px rgba(232,25,44,0.12)';" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(232,25,44,0.2)'; this.style.boxShadow='0 4px 30px rgba(232,25,44,0.03)';">
                    <div style="display: flex; align-items: center; gap: 20px; z-index: 2;">
                        <div style="width: 52px; height: 52px; background: rgba(232,25,44,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px; flex-shrink: 0; box-shadow: 0 4px 12px rgba(232,25,44,0.08);">🎫</div>
                        <div style="line-height: 1.5;">
                            <strong style="color: var(--white); font-weight: 700; font-size: 16px; display: block; margin-bottom: 4px; letter-spacing: 0.5px;">HDFC Bank Offer</strong>
                            <span style="color: var(--muted); font-size: 14px;">Get <span style="color: var(--green); font-weight: 700;">₹150 off</span> on your first booking using HDFC Debit/Credit card.</span>
                        </div>
                    </div>
                    <div style="font-family: var(--font-mono); color: var(--gold); border: 1px dashed rgba(245,200,66,0.4); padding: 8px 18px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; letter-spacing: 1px; background: rgba(245,200,66,0.03); z-index: 2; transition: all 0.2s;" onmouseover="this.style.background='rgba(245,200,66,0.08)'" onmouseout="this.style.background='rgba(245,200,66,0.03)'" onclick="navigator.clipboard.writeText('HDFC150'); alert('Promo code copied to clipboard!')">HDFC150</div>
                </div>
            </div>
        </div>
    </section>

    <section style="background: var(--surface);">
        <div class="container">
            <x-movie.category-grid />
        </div>
    </section>
    <section class="container" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header" style="flex-direction: column; align-items: flex-start; gap: 24px; margin-bottom: 48px;">
            <div style="display: flex; justify-content: space-between; width: 100%; align-items: center;">
                <div class="section-title" style="font-size: 40px; letter-spacing: 2px;">TRENDING <span>MOVIES</span></div>
                <a href="{{ route('movies.index') }}" class="btn btn-ghost btn-sm" style="border-radius: 100px; padding: 8px 20px; font-size: 13px;">See All ➔</a>
            </div>
            <div class="pill-tabs" style="gap: 12px;">
                <button class="pill-tab active">All</button>
                <button class="pill-tab">Action</button>
                <button class="pill-tab">Drama</button>
                <button class="pill-tab">Comedy</button>
                <button class="pill-tab">Thriller</button>
                <button class="pill-tab">Sci-Fi</button>
            </div>
        </div>
        
        <div class="movies-grid" style="grid-template-columns: repeat(5, 1fr); gap: 40px;">
            <x-movie.movie-card 
                title="Dhurandhar" 
                full_title="Dhurandhar 2"
                rating="8.8" 
                genre="Action/Thriller" 
                duration="2h 37m" 
                emoji="🗡️" 
                poster="poster-6" 
                image="dhurandhar2.jpg"
                :formats="['2D', 'IMAX 2D']"
            />
            <x-movie.movie-card 
                title="Krishna" 
                full_title="Krishnavataram Part 1: The Heart"
                rating="9.1" 
                genre="Adventure/Devotional/Drama" 
                duration="2h 45m" 
                emoji="🕉️" 
                poster="poster-1" 
                image="Krishnavataram_Part_1_The_Heart.jpg"
                :formats="['2D', '3D']"
            />
            <x-movie.movie-card 
                title="Aakhri" 
                full_title="Aakhri Sawal"
                rating="9.3" 
                genre="Drama" 
                duration="2h 15m" 
                emoji="⚖️" 
                poster="poster-3" 
                image="akhiri_sawaal.jpg"
                :formats="['2D']"
            />
            <x-movie.movie-card 
                title="Michael" 
                full_title="Michael"
                rating="8.5" 
                genre="Action/Thriller" 
                duration="2h 30m" 
                emoji="🕶️" 
                poster="poster-2" 
                image="michael.jpg"
                :formats="['2D', 'IMAX']"
            />
            <x-movie.movie-card 
                title="Project" 
                full_title="Project Hail Mary"
                rating="9.0" 
                genre="Sci-Fi/Adventure" 
                duration="2h 20m" 
                emoji="🚀" 
                poster="poster-4" 
                image="project_hail_marry.jpg"
                :formats="['2D', 'IMAX 3D']"
            />
        </div>
    </section>

    <section class="container" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header" style="margin-bottom: 48px;">
            <div class="section-title" style="font-size: 40px; letter-spacing: 2px;">UPCOMING <span>EVENTS</span></div>
            <a href="{{ route('events.index') }}" class="btn btn-ghost btn-sm" style="border-radius: 100px; padding: 8px 20px; font-size: 13px; text-decoration: none;">See All ➔</a>
        </div>
        <div class="grid" style="grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div style="height: 220px; position: relative; overflow: hidden;">
                    <img src="{{ asset('assets/images/movies/event1b.jpg') }}" alt="TOXIC - Abhishek Upmanyu Live" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">TOXIC - Abhishek Upmanyu Live</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 Sun, 5 Apr onwards</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 The Laugh Store: DLF Mall of India</div>
                        <div style="display: flex; align-items: center; gap: 10px;">🎙 Stand up Comedy</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 1,499 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div style="height: 220px; position: relative; overflow: hidden;">
                    <img src="{{ asset('assets/images/movies/event2.jpg') }}" alt="IPL 2026: Grand Finale" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">IPL 2026: Grand Finale</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 Sun, 31 May 2026, 7:30 PM</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 Wankhede Stadium, Mumbai</div>
                        <div style="display: flex; align-items: center; gap: 10px;">🏟 Sports · TATA IPL</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 1,500 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div style="height: 220px; position: relative; overflow: hidden;">
                    <img src="{{ asset('assets/images/movies/event3.avif') }}" alt="Sunburn Festival 2026" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 16px; right: 16px; background: var(--red); color: var(--white); font-size: 10px; font-weight: 700; padding: 4px 10px; border-radius: 6px; letter-spacing: 1px;">PROMOTED</div>
                </div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">Sunburn Festival 2026</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 Fri, 18 Dec onwards</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 Mahalaxmi Race Course, Mumbai</div>
                        <div style="display: flex; align-items: center; gap: 10px;">🎙 Concerts · Electronic</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 3,000 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>