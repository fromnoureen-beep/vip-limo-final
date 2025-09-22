# VIP Limo Transportation Website

## Overview
This is a VIP Limo transportation website built as a **pure frontend solution** using a static WordPress export. The website provides booking services for luxury vehicle transportation in the Boston area with all calculations and interactions handled client-side.

## Project Structure
- **Frontend**: Static WordPress site served by Python HTTP server
- **Backend**: None (pure frontend solution)
- **Database**: None (frontend-only booking confirmations)
- **Integration**: Google Maps API for distance calculation (frontend-only)

## Key Features
- Vehicle booking system with dynamic pricing calculations
- Real-time distance and fare calculation using Google Maps API
- Frontend-only fleet management with hardcoded vehicle data
- Booking confirmation system (no database storage)
- Responsive design optimized for mobile and desktop

## Technical Setup
- **Server**: Python HTTP server on port 5000 (static file serving)
- **Database**: None (converted to frontend-only)
- **API Routes**: None (all logic moved to frontend JavaScript)
- **Pricing Logic**: Frontend JavaScript with exact pricing structure maintained

## Vehicle Pricing Structure (Frontend JavaScript)
- **Sedan (2 people)**: $25 base + $3/mile after first mile
- **Mid SUV (4 people)**: $35 base + $4/mile after first mile  
- **Full SUV (6 people)**: $40 base + $5/mile after first mile
- **Sprinter (12 people)**: $50 base + $6/mile after first mile

## Current Status
✅ Successfully converted from full-stack to pure frontend solution
✅ Static file server running with Python HTTP server
✅ Vehicle data and pricing logic moved to frontend JavaScript
✅ Google Maps API integration working (with fallback estimation)
✅ Booking flow working with frontend-only confirmations
✅ Deployment configuration updated for static hosting
✅ All Node.js server files removed

## Frontend Features
- Dynamic distance calculation via Google Maps JavaScript API
- Real-time fare computation based on calculated distance
- Vehicle selection interface with trip details display
- Booking confirmation with generated reservation ID
- Fallback distance estimation if Google Maps API unavailable

## Environment Variables
- Google Maps API key embedded in frontend (for distance calculation)

## Recent Changes (September 22, 2025)
- **MAJOR**: Integrated Stripe payment processing with PHP backend
- Updated Google Maps API to use client-provided key (AIzaSyAzegVDVsmjH1m3_l3MaKa3uKbuyTCQxDE)
- Created professional payment modal with customer details form
- Implemented PHP payment.php backend for Stripe payment intent creation
- Installed PHP, Composer, and Stripe PHP SDK
- Added Stripe JavaScript SDK for frontend payment processing
- Maintained all existing pricing calculations and Google Maps integration
- Configured deployment for production autoscale hosting
- Enhanced booking flow: Location entry → Distance calculation → Vehicle selection → Payment processing